<?php  

	namespace App\Traits;

	use Chrisbjr\ApiGuard\Models\ApiKey;
	use App\User;

	trait Api{

		protected function success( $results ){
			return [
				'success' => true,
				'results' => $results
			];
		}

		protected function fail( $message ){
			return [
				'success' => false,
				'message' => $message
			];
		}

		protected function setUserByApiKey(){

			$auth_key = \Request::header(\Config::get('apiguard.keyName', 'X-Authorization'));

			if (empty($auth_key)) {
				// Try getting the key from elsewhere
				$auth_key = \Input::get(\Config::get('apiguard.keyName', 'X-Authorization'));
			}

			$key = new ApiKey;
			$key = $key->getByKey( $auth_key );

			if( $key ){
				$this->user = User::find($key->user_id);
				\Auth::setUser( $this->user );
			}
		}

		protected function paginate( $model, $request, $conditions = array() ){
			$page = isset( $request->page ) ? $request->page : 1;
			$perPage = isset( $request->perPage ) ? $request->perPage : 10;
			$order = isset( $request->order ) && in_array($request->order,['desc','asc'])  ? $request->order : "desc";
			$results = null;

			if( count($conditions) ){
				$results = $model::where($conditions)->order( 'id', $order )->paginate( $perPage, array('*') , 'page' , $page );
			}else{
				$results = $model::orderBy( 'id', $order )->paginate( $perPage, array('*') , 'page' , $page );
			}

			return $results;
		}

	}

?>
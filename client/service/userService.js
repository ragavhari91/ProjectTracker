(function () {

    app.factory('userService', ['$q', '$http', userService]);

    function userService($q, $http) {
        return {
            userRegistration: userRegistration,
            userLogin: userLogin,
            forgotPassword : forgotPassword,

        }

        function userLogin(data) {
            return $http({
                method: 'POST',
                data: data,
                url: HOST + USER_LOGIN,
            }).then(function (response) {
                return response.data;
            });
        }

        function userRegistration(data) {
            return $http({
                method: 'POST',
                data: data,
                url: HOST + USER_REGISTRATION
            }).then(function (response) {
                return response.data;
            }).catch(function(error){
               return error.data; 
            });
        }
        function forgotPassword(data) {
            alert("service called");
            alert("json is"+JSON.stringify(data));
            return $http({
                method: 'POST',
                data: data,
                url: HOST + USER_FORGOT_PASSWORD
            }).then(function (response) {
                return response.data;
            });
        }


    }
}());
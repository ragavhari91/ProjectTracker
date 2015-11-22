(function () {

    app.controller('userController', ['$scope', '$location', 'userService', '$state', userController]);

    function userController($scope, $location, userService, $state) {
        
        //login submit is handled here 
        $scope.loginSubmit = function () {
            var data = {"login_id":$scope.login_data.email,"password":$scope.login_data.password}
            userService.userLogin(data).then(function (response) {
                if(response.status === "Success")
                {
                    window.localStorage.setItem("menuDetails",JSON.stringify(response.data.menu));
                    window.localStorage.setItem("respDetails",JSON.stringify(response.data.responsibility));
                }
                else
                {
                    $scope.errormessage = response.message;
                }
                $state.go('dashboard.home');
            });

        }

        //registration submit is handled here
        $scope.registrationSubmit = function () {
            var data = {
                "first_name":$scope.registration_data.first_name,
                "last_name":$scope.registration_data.last_name,
                "email":$scope.registration_data.email_id,
                "password":$scope.registration_data.password
            };
            userService.userRegistration(data).then(function(response) {
                console.log(response);
            });
        }
        
        //:todo check menu value from localstorage is null and if so call fetch menu service
        $scope.getMenuContent = function()
        {
            $scope.menuitems = [];
            
            // get menu from local storage
            $scope.menuitems = JSON.parse(window.localStorage.getItem("menuDetails"));
            
            // check if menu value is not equal to null;
            
        }
    }

}());


(function () {

    app.controller('dashboardController', ['$scope', '$location', 'userService', '$state', dashboardController]);

    function dashboardController($scope, $location, userService, $state) 
    {
        $scope.dashboardInitial = function()
        {
            var response  =  JSON.parse(window.localStorage.getItem("userDetails"));
            
            $scope.user_first_name = response.data.user_first_name;
            $scope.user_last_name  = response.data.user_last_name;
                    
            if(response.data.user_gender === 1)
            {
                $scope.user_prefix = "Mr.";
            }
            else
            {
                $scope.user_prefix = "Mrs.";
            }
        }
    }
}());





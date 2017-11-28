angular.module('rosekaplan', [])
    .controller('LoginCtrl', LoginCtrl);
    
    LoginCtrl.$inject = ['$http'];
    
    function LoginCtrl($http){
        var vm = this;
        vm.login = function() {
            console.log('login')
            $http.post('/api/login.php', {
                login: vm.log,
                password: vm.password
            }).success(function(data) {
                window.location.href = '/admin';
                console.log(data);
            });    
        }    
    }
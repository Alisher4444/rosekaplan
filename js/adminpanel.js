angular.module('rosekaplan', [])
    .controller('AdminCtrl', AdminCtrl);
    
    AdminCtrl.$inject = ['$http'];
    
    function AdminCtrl($http){
        var vm = this;
        vm.showadd = false;
        vm.news = [];
        vm.currentNew = {};
        vm.editShow = false;
        vm.title = 'Admin Panel';
          
        if(!localStorage.getItem("currentPage")) {
    	    vm.currentPage = 0;
    	} else {
    	    vm.currentPage = localStorage.getItem("currentPage");
    	}
    	
    	
        if(!localStorage.getItem("newPage")) {
    	    vm.newPage = 0;
    	} else {
    	    vm.newPage = localStorage.getItem("newPage");
    	}
        
        vm.getNews = function() {
             localStorage.setItem("currentPage", vm.currentPage);
    	    
    	    if(vm.currentPage / 6 > 0) {
    	        vm.newPage = Math.floor(vm.currentPage/6);
    	        localStorage.setItem("newPage", vm.newPage);
    	    }
    	    $http.get(base_url+'get.php?page=' + vm.currentPage)
    	    .success(function(data){
                vm.news = data[0];
                vm.allPages = data[1];
                //1 2 3 4 5 6
                //1 2 3 4 5
                //1 2 3 4 5 6
                if(data[1] % 6 == 0) {
                    vm.pages = new Array(6);
                } else {
                  if(data[1] < 6) {
                      vm.pages = new Array(data[1]);
                  }  else {
                      if(vm.newPage == Math.floor(data[1]/6)) {
                         vm.pages = new Array(data[1]%6);
                      } else {
                          vm.pages = new Array(6);
                      }
                  }
                }
                // console.log(JSON.stringify(data));
            });
        }
        
        vm.getNews();
        
        
        vm.prevPage = function(){
    	    if(vm.currentPage!=0){
    	        vm.currentPage--;
    	        vm.getNews();
    	    }
    	}
    	
    	vm.nextPage = function(){
    	   // console.log("c: " + vm.currentPage)
    	   // console.log("a: " + vm.allPages)
    	    if(vm.currentPage!=(vm.allPages - 1)){
    	        ++vm.currentPage;
    	        vm.getNews();
    	    }
    	}
    	
    	vm.openPage = function(index){
    	    console.log(index)
            vm.currentPage = index;
            console.log(index)
            vm.getNews();
    	}

        vm.showAdd = function(){
        	vm.showadd = !vm.showadd;
        }

        vm.add = function(){
        	vm.showadd = true;
        	$http.post('/api/newAdd',{
        		ntitle: vm.ntitle,
        		desc: vm.desc,
        		txt: vm.txt
        	})
        	.success(function(response){
                vm.news.push(response);
        		alert('Added!');
        	})
        	.error(function(err){
        		console.log(err);
        	});

        	vm.showadd = false;
        }

		vm.delete = function(id, index){

            $http.delete(base_url +'delete.php?id=' + id)
            .success(function(response){
                vm.news.splice(index, 1);
                // alert('Car is deleted');
            })
            .error(function(err){
                console.log(err);
            });
        }

        
        vm.edit = function($index){
            vm.current = vm.news[$index];
            vm.editShow = !vm.editShow;
            console.log(vm.current);
            setTimeout(function() {
                vm.filling(vm.current.id, vm.current.ntitle, vm.current.desc, vm.current.txt)    
            }, 200)
            
        }
        vm.filling = function(id, ntitle, desc, txt) {
            document.getElementById("Id").value = id;     
            document.getElementById("ntitle").value = ntitle;
            document.getElementById("desc").value = desc;
            document.getElementById("txt").value = txt;
        }
    
    
        vm.update = function(){
            $http.put('/api/news', vm.currentNew)
            .success(function(response){
                alert('New is edited succesfully');
            })
            .error(function(err){
                console.log(err);
            });
            vm.editShow = false;
        }

    }
    
   function uploadFileUrlG(file) {
    	if (file.files && file.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            	var img = document.getElementById("cImg");
            	img.src = e.target.result;
            };
            reader.readAsDataURL(file.files[0]);
        }
    }
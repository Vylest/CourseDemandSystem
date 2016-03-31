app.factory('ScrollService', ['$http', '$location',
    function($http, $location) {
        var Entry = function() {
            this.busy = false;
            this.after = 2;
        };

        Entry.prototype.nextPage = function() {
            if (this.busy) {
                return;
            }

            this.busy = true;

            params = $location.search();
            params.page = this.after;
            var url = window.location.pathname;

            $http.get(url, {
                params: params
            }).success(function(data) {
                var items = data.data;
                for (var i = 0; i < items.length; i++) {
                    angular.element('[ng-controller=TableController]').scope().tableParams.data.push(items[i]);
                }
                this.after++;
                this.busy = false;
            }.bind(this));
        };

        return Entry;
    }
]);
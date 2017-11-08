/**
 * Class for common dom operations to avoid duplicate code
 * @module FILTER
 * @class
 */
var FILTER = (function () {
    return {
        orderBy: function(object, key){
            return array.sort(function(a, b) {
                var x = a[key]; var y = b[key];
                return ((x < y) ? -1 : ((x > y) ? 1 : 0));
            });
        }
    }
})();
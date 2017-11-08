/**
 * Class for common JSON operations to avoid duplicate code
 * @module JSON
 * @class
 */
var JSON = (function () {


  return {
      merge: function(firstObject, secondObject){

          for(var item = 0; item < secondObject.length; item++){
            firstObject.push(secondObject[item]);
          }

          return firstObject;
      }
  }

})();
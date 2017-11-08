/**
 * Common cookie operations
 * @module COOKIE
 * @class
 */
var COOKIE = (function () {

  return {
    /**
     *  get a cookie value
     *  @memberof COOKIE
     *  @function getValue
     *  @param {string} name - Value of the name 
     */
    getValue: function (name) {

      var value = '; ' + document.cookie;
      var parts = value.split('; ' + name + '=');
      if (parts.length == 2) return parts.pop().split(';').shift();
      
    },
    /**
     *  get a cookie value
     *  @memberof COOKIE
     *  @function setValue
     *  @param {string} key - Cookie key
     *  @param {string} value - Cookie value
     */
    setValue: function (key, value) {

      document.cookie = key + '=' + value + ';';

    }
  }

})();

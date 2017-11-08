/**
 * Class for common dom operations to avoid duplicate code
 * @module DOM
 * @class
 */
var DOM = (function () {


  return {

    createElement: function(object){
      if(object.el){
        var element = document.createElement(object.el);
      }
        
      if(object.class){
        element.className = object.class;
      }

      if(object.id){
        element.id = object.id;
      }
      
      if(object.html){
        element.innerHTML = object.html
      }
      
      return element;
    },

    /**
     * toggles classes on element or array of elements
     * @memberof DOM
     * @function toggle
     * @param {Object} element 
     * @param {string} classToHave
     */
    toggle: function (element, classToHave) {
     
      if (element[0] !== undefined ) {
        for (var i = 0; i < element.length; i++) {
          if (element[i].classList.contains(classToHave)) {
            element[i].classList.remove(classToHave)
          } else {
            element[i].classList.add(classToHave)
          }
        }
      }else {
        
        if (element.classList.contains(classToHave)) {
          element.classList.remove(classToHave)
        } else {
          element.classList.add(classToHave)
        }
      }

    },
    /**
     * Sets listeners on classes
     * @memberof DOM
     * @function setListeners
     * @param {string} eventType - Type of event 
     * @param {string} className - Elements with that classname get the event
     * @param {function} functionName - Function that will be executed on the event
     */
    setListeners: function (eventType, className, functionName) {

      var elements = document.getElementsByClassName(className);
      var elementsLength = elements.length;
      for (var element = 0; element < elementsLength; element++) {
        elements[element].addEventListener(eventType, functionName, false);
      }

    },

    /**
     * Get element with attribute that contains the requested value
     * @memberof DOM
     * @function elementWithAttribute
     * @param {object} elementStart - Element to start from
     * @param {string} elementType - Type of the element
     * @param {string} attribute - attribute Type
     * @param {string} attributeValue - attribute Value
     */

    elementWithAttribute: function(elementStart, elementType, attribute, attributeValue){
      var elements = elementStart.getElementsByTagName(elementType);
      for(var element = 0; element < elements.length; element++){
        var value = elements[element].getAttribute(attribute);

        if(value !== null && value === attributeValue){

          return elements[element];
        }
      }
    }
  };

})()

module.exports = DOM;

/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/profile.js":
/*!*********************************!*\
  !*** ./resources/js/profile.js ***!
  \*********************************/
/***/ (() => {

eval("document.addEventListener('DOMContentLoaded', function () {\n  var form = document.getElementById('form-edit-photo');\n  var inputAvatar = document.getElementById('file'); // Тригерим input[file]\n\n  document.getElementById('edit-photo').addEventListener('click', function (e) {\n    inputAvatar.click();\n  }); // Сохраняем фото при выборе\n\n  inputAvatar.addEventListener('change', function () {\n    var formData = new FormData(form);\n    axios.post('/profile/update-avatar', formData).then(function () {\n      window.location.reload();\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvcHJvZmlsZS5qcz8wZDI0Il0sIm5hbWVzIjpbImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsImZvcm0iLCJnZXRFbGVtZW50QnlJZCIsImlucHV0QXZhdGFyIiwiZSIsImNsaWNrIiwiZm9ybURhdGEiLCJGb3JtRGF0YSIsImF4aW9zIiwicG9zdCIsInRoZW4iLCJ3aW5kb3ciLCJsb2NhdGlvbiIsInJlbG9hZCJdLCJtYXBwaW5ncyI6IkFBQUFBLFFBQVEsQ0FBQ0MsZ0JBQVQsQ0FBMEIsa0JBQTFCLEVBQThDLFlBQU07QUFDaEQsTUFBTUMsSUFBSSxHQUFHRixRQUFRLENBQUNHLGNBQVQsQ0FBd0IsaUJBQXhCLENBQWI7QUFDQSxNQUFNQyxXQUFXLEdBQUdKLFFBQVEsQ0FBQ0csY0FBVCxDQUF3QixNQUF4QixDQUFwQixDQUZnRCxDQUloRDs7QUFDQUgsRUFBQUEsUUFBUSxDQUFDRyxjQUFULENBQXdCLFlBQXhCLEVBQXNDRixnQkFBdEMsQ0FBdUQsT0FBdkQsRUFBZ0UsVUFBQ0ksQ0FBRCxFQUFPO0FBQ25FRCxJQUFBQSxXQUFXLENBQUNFLEtBQVo7QUFDSCxHQUZELEVBTGdELENBU2hEOztBQUNBRixFQUFBQSxXQUFXLENBQUNILGdCQUFaLENBQTZCLFFBQTdCLEVBQXVDLFlBQU07QUFDekMsUUFBSU0sUUFBUSxHQUFHLElBQUlDLFFBQUosQ0FBYU4sSUFBYixDQUFmO0FBQ0FPLElBQUFBLEtBQUssQ0FBQ0MsSUFBTixDQUFXLHdCQUFYLEVBQXFDSCxRQUFyQyxFQUNLSSxJQURMLENBQ1UsWUFBTTtBQUNSQyxNQUFBQSxNQUFNLENBQUNDLFFBQVAsQ0FBZ0JDLE1BQWhCO0FBQ0gsS0FITDtBQUlILEdBTkQ7QUFPSCxDQWpCRCIsInNvdXJjZXNDb250ZW50IjpbImRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCAoKSA9PiB7XG4gICAgY29uc3QgZm9ybSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdmb3JtLWVkaXQtcGhvdG8nKVxuICAgIGNvbnN0IGlucHV0QXZhdGFyID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2ZpbGUnKVxuXG4gICAgLy8g0KLRgNC40LPQtdGA0LjQvCBpbnB1dFtmaWxlXVxuICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdlZGl0LXBob3RvJykuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoZSkgPT4ge1xuICAgICAgICBpbnB1dEF2YXRhci5jbGljaygpXG4gICAgfSlcblxuICAgIC8vINCh0L7RhdGA0LDQvdGP0LXQvCDRhNC+0YLQviDQv9GA0Lgg0LLRi9Cx0L7RgNC1XG4gICAgaW5wdXRBdmF0YXIuYWRkRXZlbnRMaXN0ZW5lcignY2hhbmdlJywgKCkgPT4ge1xuICAgICAgICBsZXQgZm9ybURhdGEgPSBuZXcgRm9ybURhdGEoZm9ybSlcbiAgICAgICAgYXhpb3MucG9zdCgnL3Byb2ZpbGUvdXBkYXRlLWF2YXRhcicsIGZvcm1EYXRhKVxuICAgICAgICAgICAgLnRoZW4oKCkgPT4ge1xuICAgICAgICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbi5yZWxvYWQoKVxuICAgICAgICAgICAgfSlcbiAgICB9KVxufSlcbiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcHJvZmlsZS5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/profile.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/profile.js"]();
/******/ 	
/******/ })()
;
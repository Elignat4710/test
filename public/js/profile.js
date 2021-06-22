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

eval("document.addEventListener('DOMContentLoaded', function () {\n  var form = document.getElementById('form-edit-photo');\n  var inputAvatar = document.getElementById('file');\n  document.getElementById('edit-photo').addEventListener('click', function (e) {\n    inputAvatar.click();\n  });\n  inputAvatar.addEventListener('change', function () {\n    var formData = new FormData(form);\n    axios.post('/profile/update-avatar', formData).then(function () {\n      window.location.reload();\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvcHJvZmlsZS5qcz8wZDI0Il0sIm5hbWVzIjpbImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsImZvcm0iLCJnZXRFbGVtZW50QnlJZCIsImlucHV0QXZhdGFyIiwiZSIsImNsaWNrIiwiZm9ybURhdGEiLCJGb3JtRGF0YSIsImF4aW9zIiwicG9zdCIsInRoZW4iLCJ3aW5kb3ciLCJsb2NhdGlvbiIsInJlbG9hZCJdLCJtYXBwaW5ncyI6IkFBQUFBLFFBQVEsQ0FBQ0MsZ0JBQVQsQ0FBMEIsa0JBQTFCLEVBQThDLFlBQU07QUFDaEQsTUFBTUMsSUFBSSxHQUFHRixRQUFRLENBQUNHLGNBQVQsQ0FBd0IsaUJBQXhCLENBQWI7QUFDQSxNQUFNQyxXQUFXLEdBQUdKLFFBQVEsQ0FBQ0csY0FBVCxDQUF3QixNQUF4QixDQUFwQjtBQUVBSCxFQUFBQSxRQUFRLENBQUNHLGNBQVQsQ0FBd0IsWUFBeEIsRUFBc0NGLGdCQUF0QyxDQUF1RCxPQUF2RCxFQUFnRSxVQUFDSSxDQUFELEVBQU87QUFDbkVELElBQUFBLFdBQVcsQ0FBQ0UsS0FBWjtBQUNILEdBRkQ7QUFJQUYsRUFBQUEsV0FBVyxDQUFDSCxnQkFBWixDQUE2QixRQUE3QixFQUF1QyxZQUFNO0FBQ3pDLFFBQUlNLFFBQVEsR0FBRyxJQUFJQyxRQUFKLENBQWFOLElBQWIsQ0FBZjtBQUNBTyxJQUFBQSxLQUFLLENBQUNDLElBQU4sQ0FBVyx3QkFBWCxFQUFxQ0gsUUFBckMsRUFDS0ksSUFETCxDQUNVLFlBQU07QUFDUkMsTUFBQUEsTUFBTSxDQUFDQyxRQUFQLENBQWdCQyxNQUFoQjtBQUNILEtBSEw7QUFJSCxHQU5EO0FBT0gsQ0FmRCIsInNvdXJjZXNDb250ZW50IjpbImRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCAoKSA9PiB7XG4gICAgY29uc3QgZm9ybSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdmb3JtLWVkaXQtcGhvdG8nKVxuICAgIGNvbnN0IGlucHV0QXZhdGFyID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2ZpbGUnKVxuXG4gICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2VkaXQtcGhvdG8nKS5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIChlKSA9PiB7XG4gICAgICAgIGlucHV0QXZhdGFyLmNsaWNrKClcbiAgICB9KVxuXG4gICAgaW5wdXRBdmF0YXIuYWRkRXZlbnRMaXN0ZW5lcignY2hhbmdlJywgKCkgPT4ge1xuICAgICAgICBsZXQgZm9ybURhdGEgPSBuZXcgRm9ybURhdGEoZm9ybSlcbiAgICAgICAgYXhpb3MucG9zdCgnL3Byb2ZpbGUvdXBkYXRlLWF2YXRhcicsIGZvcm1EYXRhKVxuICAgICAgICAgICAgLnRoZW4oKCkgPT4ge1xuICAgICAgICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbi5yZWxvYWQoKVxuICAgICAgICAgICAgfSlcbiAgICB9KVxufSlcbiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcHJvZmlsZS5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/profile.js\n");

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
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

/***/ "./resources/js/create-post.js":
/*!*************************************!*\
  !*** ./resources/js/create-post.js ***!
  \*************************************/
/***/ (() => {

eval("document.addEventListener('DOMContentLoaded', function () {\n  var tagsName = [];\n  document.getElementById('category').addEventListener('input', function (e) {\n    var dataList = document.getElementById('category_name');\n    searchOptions('/search-category', e.target.value, dataList);\n  });\n  document.getElementById('tag').addEventListener('input', function (e) {\n    e.target.value = e.target.value.trim();\n    var dataList = document.getElementById('tags-name');\n    searchOptions('/search-tag', e.target.value, dataList);\n  });\n  document.getElementById('tag').addEventListener('keydown', function (e) {\n    if (e.code === 'Space' && e.target.value.length != 0) {\n      tagsName.push(e.target.value);\n      var arrayTag = document.getElementById('array-tag');\n      arrayTag.value = '';\n      arrayTag.value = JSON.stringify(tagsName);\n      var tagsList = document.getElementById('tags-list');\n      var string = \"<span class=\\\"badge badge-pill badge-success mr-1\\\">\".concat(e.target.value, \"</span>\");\n      e.target.value = '';\n      tagsList.insertAdjacentHTML('afterend', string);\n    }\n  });\n}, true);\n\nvar searchOptions = function searchOptions(url, value, dataList) {\n  axios.get(url, {\n    params: {\n      search: value\n    }\n  }).then(function (data) {\n    dataList.innerHTML = '';\n    var string = '';\n\n    for (var i = 0; i < data.data.models.length; i++) {\n      string += \"<option value=\\\"\".concat(data.data.models[i].name, \"\\\">\");\n    }\n\n    dataList.insertAdjacentHTML('afterbegin', string);\n  });\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY3JlYXRlLXBvc3QuanM/MDRhYyJdLCJuYW1lcyI6WyJkb2N1bWVudCIsImFkZEV2ZW50TGlzdGVuZXIiLCJ0YWdzTmFtZSIsImdldEVsZW1lbnRCeUlkIiwiZSIsImRhdGFMaXN0Iiwic2VhcmNoT3B0aW9ucyIsInRhcmdldCIsInZhbHVlIiwidHJpbSIsImNvZGUiLCJsZW5ndGgiLCJwdXNoIiwiYXJyYXlUYWciLCJKU09OIiwic3RyaW5naWZ5IiwidGFnc0xpc3QiLCJzdHJpbmciLCJpbnNlcnRBZGphY2VudEhUTUwiLCJ1cmwiLCJheGlvcyIsImdldCIsInBhcmFtcyIsInNlYXJjaCIsInRoZW4iLCJkYXRhIiwiaW5uZXJIVE1MIiwiaSIsIm1vZGVscyIsIm5hbWUiXSwibWFwcGluZ3MiOiJBQUFBQSxRQUFRLENBQUNDLGdCQUFULENBQTBCLGtCQUExQixFQUE4QyxZQUFNO0FBQ2hELE1BQU1DLFFBQVEsR0FBRyxFQUFqQjtBQUVBRixFQUFBQSxRQUFRLENBQUNHLGNBQVQsQ0FBd0IsVUFBeEIsRUFBb0NGLGdCQUFwQyxDQUFxRCxPQUFyRCxFQUE4RCxVQUFDRyxDQUFELEVBQU87QUFDakUsUUFBSUMsUUFBUSxHQUFHTCxRQUFRLENBQUNHLGNBQVQsQ0FBd0IsZUFBeEIsQ0FBZjtBQUVBRyxJQUFBQSxhQUFhLENBQUMsa0JBQUQsRUFBcUJGLENBQUMsQ0FBQ0csTUFBRixDQUFTQyxLQUE5QixFQUFxQ0gsUUFBckMsQ0FBYjtBQUNILEdBSkQ7QUFNQUwsRUFBQUEsUUFBUSxDQUFDRyxjQUFULENBQXdCLEtBQXhCLEVBQStCRixnQkFBL0IsQ0FBZ0QsT0FBaEQsRUFBeUQsVUFBQ0csQ0FBRCxFQUFPO0FBQzVEQSxJQUFBQSxDQUFDLENBQUNHLE1BQUYsQ0FBU0MsS0FBVCxHQUFpQkosQ0FBQyxDQUFDRyxNQUFGLENBQVNDLEtBQVQsQ0FBZUMsSUFBZixFQUFqQjtBQUVBLFFBQUlKLFFBQVEsR0FBR0wsUUFBUSxDQUFDRyxjQUFULENBQXdCLFdBQXhCLENBQWY7QUFFQUcsSUFBQUEsYUFBYSxDQUFDLGFBQUQsRUFBZ0JGLENBQUMsQ0FBQ0csTUFBRixDQUFTQyxLQUF6QixFQUFnQ0gsUUFBaEMsQ0FBYjtBQUNILEdBTkQ7QUFRQUwsRUFBQUEsUUFBUSxDQUFDRyxjQUFULENBQXdCLEtBQXhCLEVBQStCRixnQkFBL0IsQ0FBZ0QsU0FBaEQsRUFBMkQsVUFBQ0csQ0FBRCxFQUFPO0FBQzlELFFBQUlBLENBQUMsQ0FBQ00sSUFBRixLQUFXLE9BQVgsSUFBc0JOLENBQUMsQ0FBQ0csTUFBRixDQUFTQyxLQUFULENBQWVHLE1BQWYsSUFBeUIsQ0FBbkQsRUFBc0Q7QUFDbERULE1BQUFBLFFBQVEsQ0FBQ1UsSUFBVCxDQUFjUixDQUFDLENBQUNHLE1BQUYsQ0FBU0MsS0FBdkI7QUFDQSxVQUFJSyxRQUFRLEdBQUdiLFFBQVEsQ0FBQ0csY0FBVCxDQUF3QixXQUF4QixDQUFmO0FBQ0FVLE1BQUFBLFFBQVEsQ0FBQ0wsS0FBVCxHQUFpQixFQUFqQjtBQUNBSyxNQUFBQSxRQUFRLENBQUNMLEtBQVQsR0FBaUJNLElBQUksQ0FBQ0MsU0FBTCxDQUFlYixRQUFmLENBQWpCO0FBRUEsVUFBSWMsUUFBUSxHQUFHaEIsUUFBUSxDQUFDRyxjQUFULENBQXdCLFdBQXhCLENBQWY7QUFDQSxVQUFJYyxNQUFNLGlFQUF3RGIsQ0FBQyxDQUFDRyxNQUFGLENBQVNDLEtBQWpFLFlBQVY7QUFFQUosTUFBQUEsQ0FBQyxDQUFDRyxNQUFGLENBQVNDLEtBQVQsR0FBaUIsRUFBakI7QUFFQVEsTUFBQUEsUUFBUSxDQUFDRSxrQkFBVCxDQUE0QixVQUE1QixFQUF3Q0QsTUFBeEM7QUFDSDtBQUNKLEdBZEQ7QUFlSCxDQWhDRCxFQWdDRyxJQWhDSDs7QUFrQ0EsSUFBSVgsYUFBYSxHQUFHLFNBQWhCQSxhQUFnQixDQUFDYSxHQUFELEVBQU1YLEtBQU4sRUFBYUgsUUFBYixFQUEwQjtBQUMxQ2UsRUFBQUEsS0FBSyxDQUFDQyxHQUFOLENBQVVGLEdBQVYsRUFBZTtBQUNYRyxJQUFBQSxNQUFNLEVBQUU7QUFDSkMsTUFBQUEsTUFBTSxFQUFFZjtBQURKO0FBREcsR0FBZixFQUtLZ0IsSUFMTCxDQUtVLFVBQUNDLElBQUQsRUFBVTtBQUNacEIsSUFBQUEsUUFBUSxDQUFDcUIsU0FBVCxHQUFxQixFQUFyQjtBQUVBLFFBQUlULE1BQU0sR0FBRyxFQUFiOztBQUVBLFNBQUssSUFBSVUsQ0FBQyxHQUFHLENBQWIsRUFBZ0JBLENBQUMsR0FBR0YsSUFBSSxDQUFDQSxJQUFMLENBQVVHLE1BQVYsQ0FBaUJqQixNQUFyQyxFQUE2Q2dCLENBQUMsRUFBOUMsRUFBa0Q7QUFDOUNWLE1BQUFBLE1BQU0sOEJBQXNCUSxJQUFJLENBQUNBLElBQUwsQ0FBVUcsTUFBVixDQUFpQkQsQ0FBakIsRUFBb0JFLElBQTFDLFFBQU47QUFDSDs7QUFFRHhCLElBQUFBLFFBQVEsQ0FBQ2Esa0JBQVQsQ0FBNEIsWUFBNUIsRUFBMENELE1BQTFDO0FBQ0gsR0FmTDtBQWdCSCxDQWpCRCIsInNvdXJjZXNDb250ZW50IjpbImRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCAoKSA9PiB7XG4gICAgY29uc3QgdGFnc05hbWUgPSBbXVxuXG4gICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2NhdGVnb3J5JykuYWRkRXZlbnRMaXN0ZW5lcignaW5wdXQnLCAoZSkgPT4ge1xuICAgICAgICBsZXQgZGF0YUxpc3QgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnY2F0ZWdvcnlfbmFtZScpXG5cbiAgICAgICAgc2VhcmNoT3B0aW9ucygnL3NlYXJjaC1jYXRlZ29yeScsIGUudGFyZ2V0LnZhbHVlLCBkYXRhTGlzdClcbiAgICB9KVxuXG4gICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3RhZycpLmFkZEV2ZW50TGlzdGVuZXIoJ2lucHV0JywgKGUpID0+IHtcbiAgICAgICAgZS50YXJnZXQudmFsdWUgPSBlLnRhcmdldC52YWx1ZS50cmltKClcblxuICAgICAgICBsZXQgZGF0YUxpc3QgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndGFncy1uYW1lJylcblxuICAgICAgICBzZWFyY2hPcHRpb25zKCcvc2VhcmNoLXRhZycsIGUudGFyZ2V0LnZhbHVlLCBkYXRhTGlzdClcbiAgICB9KVxuXG4gICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3RhZycpLmFkZEV2ZW50TGlzdGVuZXIoJ2tleWRvd24nLCAoZSkgPT4ge1xuICAgICAgICBpZiAoZS5jb2RlID09PSAnU3BhY2UnICYmIGUudGFyZ2V0LnZhbHVlLmxlbmd0aCAhPSAwKSB7XG4gICAgICAgICAgICB0YWdzTmFtZS5wdXNoKGUudGFyZ2V0LnZhbHVlKVxuICAgICAgICAgICAgbGV0IGFycmF5VGFnID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2FycmF5LXRhZycpXG4gICAgICAgICAgICBhcnJheVRhZy52YWx1ZSA9ICcnXG4gICAgICAgICAgICBhcnJheVRhZy52YWx1ZSA9IEpTT04uc3RyaW5naWZ5KHRhZ3NOYW1lKVxuXG4gICAgICAgICAgICBsZXQgdGFnc0xpc3QgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndGFncy1saXN0JylcbiAgICAgICAgICAgIGxldCBzdHJpbmcgPSBgPHNwYW4gY2xhc3M9XCJiYWRnZSBiYWRnZS1waWxsIGJhZGdlLXN1Y2Nlc3MgbXItMVwiPiR7ZS50YXJnZXQudmFsdWV9PC9zcGFuPmBcblxuICAgICAgICAgICAgZS50YXJnZXQudmFsdWUgPSAnJ1xuXG4gICAgICAgICAgICB0YWdzTGlzdC5pbnNlcnRBZGphY2VudEhUTUwoJ2FmdGVyZW5kJywgc3RyaW5nKVxuICAgICAgICB9XG4gICAgfSlcbn0sIHRydWUpXG5cbmxldCBzZWFyY2hPcHRpb25zID0gKHVybCwgdmFsdWUsIGRhdGFMaXN0KSA9PiB7XG4gICAgYXhpb3MuZ2V0KHVybCwge1xuICAgICAgICBwYXJhbXM6IHtcbiAgICAgICAgICAgIHNlYXJjaDogdmFsdWVcbiAgICAgICAgfVxuICAgIH0pXG4gICAgICAgIC50aGVuKChkYXRhKSA9PiB7XG4gICAgICAgICAgICBkYXRhTGlzdC5pbm5lckhUTUwgPSAnJ1xuXG4gICAgICAgICAgICBsZXQgc3RyaW5nID0gJydcblxuICAgICAgICAgICAgZm9yIChsZXQgaSA9IDA7IGkgPCBkYXRhLmRhdGEubW9kZWxzLmxlbmd0aDsgaSsrKSB7XG4gICAgICAgICAgICAgICAgc3RyaW5nICs9IGA8b3B0aW9uIHZhbHVlPVwiJHtkYXRhLmRhdGEubW9kZWxzW2ldLm5hbWV9XCI+YFxuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICBkYXRhTGlzdC5pbnNlcnRBZGphY2VudEhUTUwoJ2FmdGVyYmVnaW4nLCBzdHJpbmcpXG4gICAgICAgIH0pXG59XG4iXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2NyZWF0ZS1wb3N0LmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/create-post.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/create-post.js"]();
/******/ 	
/******/ })()
;
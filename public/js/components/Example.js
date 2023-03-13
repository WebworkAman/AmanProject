"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
var _react = _interopRequireDefault(require("react"));
var _reactDom = _interopRequireDefault(require("react-dom"));
function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }
function Example() {
  return /*#__PURE__*/_react["default"].createElement("div", {
    className: "container"
  }, /*#__PURE__*/_react["default"].createElement("div", {
    className: "row justify-content-center"
  }, /*#__PURE__*/_react["default"].createElement("div", {
    className: "col-md-8"
  }, /*#__PURE__*/_react["default"].createElement("div", {
    className: "card"
  }, /*#__PURE__*/_react["default"].createElement("div", {
    className: "card-header"
  }, "Example Component"), /*#__PURE__*/_react["default"].createElement("div", {
    className: "card-body"
  }, "I'm an example component!")))));
}
var _default = Example;
exports["default"] = _default;
if (document.getElementById('example')) {
  _reactDom["default"].render( /*#__PURE__*/_react["default"].createElement(Example, null), document.getElementById('example'));
}
//# sourceMappingURL=Example.js.map
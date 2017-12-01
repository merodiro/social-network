webpackJsonp([1],{

/***/ 1:
/***/ (function(module, exports) {

// this module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle

module.exports = function normalizeComponent (
  rawScriptExports,
  compiledTemplate,
  scopeId,
  cssModules
) {
  var esModule
  var scriptExports = rawScriptExports = rawScriptExports || {}

  // ES6 modules interop
  var type = typeof rawScriptExports.default
  if (type === 'object' || type === 'function') {
    esModule = rawScriptExports
    scriptExports = rawScriptExports.default
  }

  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (compiledTemplate) {
    options.render = compiledTemplate.render
    options.staticRenderFns = compiledTemplate.staticRenderFns
  }

  // scopedId
  if (scopeId) {
    options._scopeId = scopeId
  }

  // inject cssModules
  if (cssModules) {
    var computed = Object.create(options.computed || null)
    Object.keys(cssModules).forEach(function (key) {
      var module = cssModules[key]
      computed[key] = function () { return module }
    })
    options.computed = computed
  }

  return {
    esModule: esModule,
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ 234:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Vue.js 2.0 plugin
 *
 */


function formatComponentName (vm) {
    if (vm.$root === vm) {
        return 'root instance'
    }
    var name = vm._isVue
        ? vm.$options.name || vm.$options._componentTag
        : vm.name
    return (name ? 'component <' + name + '>' : 'anonymous component') +
        (vm._isVue && vm.$options.__file ? ' at ' + vm.$options.__file  : '')
}

function vuePlugin(Raven, Vue) {
    Vue = Vue || window.Vue;

    // quit if Vue isn't on the page
    if (!Vue || !Vue.config) return;

    var _oldOnError = Vue.config.errorHandler;
    Vue.config.errorHandler = function VueErrorHandler(error, vm) {
        Raven.captureException(error, {
          extra: {
            componentName: formatComponentName(vm),
            propsData: vm.$options.propsData
          }
        });

        if (typeof _oldOnError === 'function') {
            _oldOnError.call(this, error, vm);
        }
    };
}

module.exports = vuePlugin;



/***/ }),

/***/ 24:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__store__ = __webpack_require__(51);
__webpack_require__(50);



Vue.component('friend', __webpack_require__(241));
Vue.component('post', __webpack_require__(244));
Vue.component('feed', __webpack_require__(240));
Vue.component('notification', __webpack_require__(243));
Vue.component('unread', __webpack_require__(246));
Vue.component('search', __webpack_require__(245));

var app = new Vue({
    el: '#app',
    store: __WEBPACK_IMPORTED_MODULE_0__store__["a" /* store */]
});

/***/ }),

/***/ 240:
/***/ (function(module, exports, __webpack_require__) {


/* styles */
__webpack_require__(256)

var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(43),
  /* template */
  __webpack_require__(252),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "C:\\laragon\\www\\social-network\\resources\\assets\\js\\components\\Feed.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] Feed.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-659cc380", Component.options)
  } else {
    hotAPI.reload("data-v-659cc380", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 241:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(44),
  /* template */
  __webpack_require__(248),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "C:\\laragon\\www\\social-network\\resources\\assets\\js\\components\\Friend.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] Friend.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0f4028c0", Component.options)
  } else {
    hotAPI.reload("data-v-0f4028c0", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 242:
/***/ (function(module, exports, __webpack_require__) {


/* styles */
__webpack_require__(254)

var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(45),
  /* template */
  __webpack_require__(250),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "C:\\laragon\\www\\social-network\\resources\\assets\\js\\components\\Like.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] Like.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1a5cc3b9", Component.options)
  } else {
    hotAPI.reload("data-v-1a5cc3b9", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 243:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(46),
  /* template */
  __webpack_require__(249),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "C:\\laragon\\www\\social-network\\resources\\assets\\js\\components\\Notification.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] Notification.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-12f1ade6", Component.options)
  } else {
    hotAPI.reload("data-v-12f1ade6", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 244:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(47),
  /* template */
  __webpack_require__(247),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "C:\\laragon\\www\\social-network\\resources\\assets\\js\\components\\Post.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] Post.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-05c10042", Component.options)
  } else {
    hotAPI.reload("data-v-05c10042", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 245:
/***/ (function(module, exports, __webpack_require__) {


/* styles */
__webpack_require__(255)

var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(48),
  /* template */
  __webpack_require__(251),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "C:\\laragon\\www\\social-network\\resources\\assets\\js\\components\\Search.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] Search.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-4d9beeca", Component.options)
  } else {
    hotAPI.reload("data-v-4d9beeca", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 246:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(1)(
  /* script */
  __webpack_require__(49),
  /* template */
  __webpack_require__(253),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "C:\\laragon\\www\\social-network\\resources\\assets\\js\\components\\UnreadNots.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] UnreadNots.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-d4149e1e", Component.options)
  } else {
    hotAPI.reload("data-v-d4149e1e", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 247:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "container"
  }, [_c('div', {
    staticClass: "row"
  }, [_c('div', {
    staticClass: "col-md-10 col-md-offset-1"
  }, [_c('div', {
    staticClass: "panel panel-default"
  }, [_c('div', {
    staticClass: "panel-body"
  }, [_c('textarea', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.content),
      expression: "content"
    }],
    staticClass: "form-control",
    attrs: {
      "rows": "5",
      "placeholder": "What is on your mind?"
    },
    domProps: {
      "value": (_vm.content)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.content = $event.target.value
      }
    }
  }), _vm._v(" "), _c('br'), _vm._v(" "), _c('button', {
    staticClass: "btn btn-success pull-right",
    attrs: {
      "disabled": _vm.not_working
    },
    on: {
      "click": function($event) {
        _vm.create_post()
      }
    }
  }, [_vm._v("\n                    \tCreate a post\n                    ")])])])])])])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-05c10042", module.exports)
  }
}

/***/ }),

/***/ 248:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', [(_vm.loading) ? _c('p', {
    staticClass: "text-center"
  }, [_vm._v("\n        Loading...\n    ")]) : _vm._e(), _vm._v(" "), (!_vm.loading) ? _c('p', {
    staticClass: "text-center"
  }, [(_vm.status == 'not friends') ? _c('button', {
    staticClass: "btn btn-success",
    attrs: {
      "id": "add-friend"
    },
    on: {
      "click": _vm.add_friend
    }
  }, [_vm._v("Add Friend")]) : _vm._e(), _vm._v(" "), (_vm.status == 'pending') ? _c('button', {
    staticClass: "btn btn-success",
    attrs: {
      "id": "accept-friend"
    },
    on: {
      "click": _vm.accept_friend
    }
  }, [_vm._v("Accept Friend")]) : _vm._e(), _vm._v(" "), (_vm.status == 'waiting') ? _c('button', {
    staticClass: "btn btn-danger",
    attrs: {
      "id": "cancel-friend"
    },
    on: {
      "click": function($event) {
        _vm.delete_friend()
      }
    }
  }, [_vm._v("Cancel friend request")]) : _vm._e(), _vm._v(" "), (_vm.status == 'friends') ? _c('button', {
    staticClass: "btn btn-danger",
    attrs: {
      "id": "delete-friend"
    },
    on: {
      "click": function($event) {
        _vm.delete_friend()
      }
    }
  }, [_vm._v("Unfriend")]) : _vm._e()]) : _vm._e()])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-0f4028c0", module.exports)
  }
}

/***/ }),

/***/ 249:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div')
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-12f1ade6", module.exports)
  }
}

/***/ }),

/***/ 25:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 250:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', [_c('div', [(_vm.post.likes.length > 1) ? _c('span', {
    staticClass: "text-info pull-right"
  }, [_vm._v(_vm._s(_vm.post.likes.length) + " people like this post")]) : _vm._e(), _vm._v(" "), (_vm.post.likes.length == 1) ? _c('span', {
    staticClass: "text-info pull-right"
  }, [_vm._v(_vm._s(_vm.post.likes.length) + " person like this post")]) : _vm._e(), _vm._v(" "), (_vm.post.likes.length == 0) ? _c('span', {
    staticClass: "text-info pull-right"
  }, [_vm._v("Be the first one to like this post")]) : _vm._e()]), _vm._v(" "), (!_vm.auth_user_likes_post) ? _c('button', {
    staticClass: "btn btn-primary",
    on: {
      "click": function($event) {
        _vm.like()
      }
    }
  }, [_vm._v("\n        Like this post\n    ")]) : _c('button', {
    staticClass: "btn btn-danger",
    on: {
      "click": function($event) {
        _vm.unlike()
      }
    }
  }, [_vm._v("\n        Unlike this post\n    ")])])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-1a5cc3b9", module.exports)
  }
}

/***/ }),

/***/ 251:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('form', {
    staticClass: "navbar-form navbar-left",
    attrs: {
      "role": "search"
    }
  }, [_c('div', {
    staticClass: "input-group"
  }, [_c('div', {
    staticClass: "input-group-btn",
    class: {
      'open': _vm.opened
    }
  }, [_c('input', {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: (_vm.query),
      expression: "query"
    }],
    staticClass: "form-control",
    attrs: {
      "type": "text",
      "placeholder": "Search for other users"
    },
    domProps: {
      "value": (_vm.query)
    },
    on: {
      "input": function($event) {
        if ($event.target.composing) { return; }
        _vm.query = $event.target.value
      }
    }
  }), _vm._v(" "), (_vm.results && _vm.query) ? _c('ul', {
    staticClass: "dropdown-menu"
  }, _vm._l((_vm.results), function(user) {
    return _c('li', [_c('a', {
      attrs: {
        "href": '/profile/' + user.slug
      }
    }, [_c('img', {
      staticClass: "search-avatar",
      attrs: {
        "src": user.avatar
      }
    }), _vm._v("\n                        " + _vm._s(user.name) + "\n                    ")])])
  })) : _vm._e()])])])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-4d9beeca", module.exports)
  }
}

/***/ }),

/***/ 252:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "container"
  }, [_c('div', {
    staticClass: "row"
  }, [_c('div', {
    staticClass: "col-lg-10 col-lg-offset-1"
  }, _vm._l((_vm.posts), function(post) {
    return _c('div', {
      staticClass: "panel panel-default"
    }, [_c('div', {
      staticClass: "panel-heading"
    }, [_c('img', {
      staticClass: "avatar-feed",
      attrs: {
        "src": post.user.avatar
      }
    }), _vm._v(" "), _c('a', {
      attrs: {
        "href": '/profile/' + post.user.slug
      }
    }, [_vm._v(_vm._s(post.user.name))]), _vm._v(" "), _c('span', {
      staticClass: "pull-right"
    }, [_vm._v(_vm._s(post.created_at))])]), _vm._v(" "), _c('div', {
      staticClass: "panel-body"
    }, [_c('p', {
      domProps: {
        "innerHTML": _vm._s(_vm.marked(post.content))
      }
    })]), _vm._v(" "), _c('div', {
      staticClass: "panel-footer"
    }, [_c('like', {
      attrs: {
        "id": post.id
      }
    })], 1)])
  }))])])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-659cc380", module.exports)
  }
}

/***/ }),

/***/ 253:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('li', [_c('a', {
    attrs: {
      "href": "/notifications"
    }
  }, [_vm._v("\n\t\tUnread Notifications\n\t\t"), _c('span', {
    staticClass: "badge badge-info"
  }, [_vm._v(_vm._s(_vm.all_nots_count))])])])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-d4149e1e", module.exports)
  }
}

/***/ }),

/***/ 254:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(52);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(7)("2aeae9fe", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"id\":\"data-v-1a5cc3b9\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Like.vue", function() {
     var newContent = require("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"id\":\"data-v-1a5cc3b9\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Like.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 255:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(53);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(7)("cc03030a", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"id\":\"data-v-4d9beeca\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Search.vue", function() {
     var newContent = require("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"id\":\"data-v-4d9beeca\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Search.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 256:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(54);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(7)("566e396a", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"id\":\"data-v-659cc380\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Feed.vue", function() {
     var newContent = require("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"id\":\"data-v-659cc380\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./Feed.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 257:
/***/ (function(module, exports) {

/**
 * Translates the list format produced by css-loader into something
 * easier to manipulate.
 */
module.exports = function listToStyles (parentId, list) {
  var styles = []
  var newStyles = {}
  for (var i = 0; i < list.length; i++) {
    var item = list[i]
    var id = item[0]
    var css = item[1]
    var media = item[2]
    var sourceMap = item[3]
    var part = {
      id: parentId + ':' + i,
      css: css,
      media: media,
      sourceMap: sourceMap
    }
    if (!newStyles[id]) {
      styles.push(newStyles[id] = { id: id, parts: [part] })
    } else {
      newStyles[id].parts.push(part)
    }
  }
  return styles
}


/***/ }),

/***/ 259:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(24);
module.exports = __webpack_require__(25);


/***/ }),

/***/ 43:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__Like_vue__ = __webpack_require__(242);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__Like_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__Like_vue__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
	components: {
		Like: __WEBPACK_IMPORTED_MODULE_0__Like_vue___default.a
	},
	mounted: function mounted() {
		this.get_feed();
	},

	methods: {
		get_feed: function get_feed() {
			var _this = this;

			axios.get('/api/feed').then(function (res) {
				res.data.forEach(function (post) {
					_this.$store.commit('ADD_POST', post);
				});
			});
		},
		marked: function (_marked) {
			function marked(_x) {
				return _marked.apply(this, arguments);
			}

			marked.toString = function () {
				return _marked.toString();
			};

			return marked;
		}(function (value) {
			return marked(value);
		})
	},
	computed: {
		posts: function posts() {
			return this.$store.getters.all_posts;
		}
	}
});

/***/ }),

/***/ 44:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    mounted: function mounted() {
        var _this = this;

        axios.get('/api/friend/check/' + this.profile_user_slug).then(function (res) {
            _this.status = res.data.status;
            _this.loading = false;
        });
    },

    props: ['profile_user_slug'],
    data: function data() {
        return {
            status: '',
            loading: true
        };
    },

    methods: {
        add_friend: function add_friend() {
            var _this2 = this;

            this.loading = true;
            axios.get('/api/friend/add/' + this.profile_user_slug).then(function (res) {
                if (res.data) {
                    _this2.status = "waiting";
                    noty('Friend request sent');
                    _this2.loading = false;
                }
            });
        },
        accept_friend: function accept_friend() {
            var _this3 = this;

            this.loading = true;
            axios.get('/api/friend/accept/' + this.profile_user_slug).then(function (res) {
                if (res.data) {
                    _this3.status = "friends";
                    noty('you are now friends');
                    _this3.loading = false;
                }
            });
        },
        delete_friend: function delete_friend() {
            var _this4 = this;

            this.loading = true;
            axios.get('/api/friend/delete/' + this.profile_user_slug).then(function (res) {
                if (res.data) {
                    _this4.status = 'not friends';
                    _this4.loading = false;
                }
            });
        }
    }
});

/***/ }),

/***/ 45:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    props: ['id'],
    computed: {
        auth_user_likes_post: function auth_user_likes_post() {
            var check_index = this.likers.indexOf(this.$store.state.auth_user.id);
            if (check_index == -1) {
                return false;
            } else {
                return true;
            }
        },
        likers: function likers() {
            var likers = [];

            this.post.likes.forEach(function (like) {
                likers.push(like.user.id);
            });

            return likers;
        },
        post: function post() {
            var _this = this;

            return this.$store.state.posts.find(function (post) {
                return post.id === _this.id;
            });
        }
    },
    methods: {
        like: function like() {
            var _this2 = this;

            axios.post('/api/like/' + this.id).then(function (res) {
                _this2.$store.commit('UPDATE_POST_LIKES', {
                    id: _this2.id,
                    like: res.data
                });
                noty('Your successfully like the post');
            });
        },
        unlike: function unlike() {
            var _this3 = this;

            axios.post('/api/unlike/' + this.id).then(function (res) {
                _this3.$store.commit('UNLIKE_POST', {
                    post_id: _this3.id,
                    like_id: res.data
                });
                noty('Your successfully unlike the post');
            });
        }
    }
});

/***/ }),

/***/ 46:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    mounted: function mounted() {
        var _this = this;

        axios.get('/api/user').then(function (res) {
            _this.$store.commit('AUTH_USER_DATA', res.data);
            _this.listen();
        });
    },

    props: ['id'],
    methods: {
        listen: function listen() {
            var _this2 = this;

            Echo.private('App.User.' + this.$store.state.auth_user.id).notification(function (notification) {
                noty(notification.message);
                _this2.$store.commit('ADD_NOT', notification);
                document.getElementById('noty_audio').play();
            });
        }
    }
});

/***/ }),

/***/ 47:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
	data: function data() {
		return {
			content: '',
			not_working: true
		};
	},

	methods: {
		create_post: function create_post() {
			var _this = this;

			axios.post('/api/post/create', { content: this.content }).then(function (res) {
				_this.content = '';
				noty('Your post has been published');
				_this.$store.commit('ADD_POST', res.data);
			});
		}
	},
	watch: {
		content: function content() {
			if (this.content.length > 0) {
				this.not_working = false;
			} else {
				this.not_working = true;
			}
		}
	}
});

/***/ }),

/***/ 48:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            query: '',
            results: []
        };
    },

    watch: {
        query: function query() {
            this.search();
        }
    },
    computed: {
        opened: function opened() {
            if (this.results.length > 0) {
                return true;
            } else {
                return false;
            }
        }
    },
    methods: {
        search: _.debounce(function function_name(argument) {
            var _this = this;

            if (_.trim(this.query) != '') {
                axios.post('/api/search', { query: this.query }).then(function (res) {
                    _this.results = res.data;
                });
            }
        }, 500)
    }
});

/***/ }),

/***/ 49:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
	mounted: function mounted() {
		this.get_unread();
	},

	methods: {
		get_unread: function get_unread() {
			var _this = this;

			axios.get('/api/get_unread').then(function (res) {
				res.data.forEach(function (not) {
					_this.$store.commit('ADD_NOT', not);
				});
			});
		}
	},
	computed: {
		all_nots_count: function all_nots_count() {
			return this.$store.getters.all_nots_count;
		}
	}
});

/***/ }),

/***/ 50:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* WEBPACK VAR INJECTION */(function(__webpack_provided_window_dot_jQuery) {/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_raven_js__ = __webpack_require__(16);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_raven_js___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_raven_js__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_raven_js_plugins_vue__ = __webpack_require__(234);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_raven_js_plugins_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_raven_js_plugins_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_laravel_echo__ = __webpack_require__(11);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_laravel_echo___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_laravel_echo__);
window._ = __webpack_require__(12);

window.$ = __webpack_provided_window_dot_jQuery = __webpack_require__(3);

__webpack_require__(9);

var Noty = __webpack_require__(14);

Noty.overrideDefaults({
    layout: 'bottomLeft',
    theme: 'sunset',
    maxVisible: 3,
    timeout: 1500,
    progressBar: true
});

window.noty = function (msg) {
    var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'success';

    new Noty({
        text: msg,
        type: type
    }).show();
};

window.Vue = __webpack_require__(4);




__WEBPACK_IMPORTED_MODULE_0_raven_js___default.a.config("https://ca531f3472b84584a5435bd09d2235cb@sentry.io/175797").addPlugin(__WEBPACK_IMPORTED_MODULE_1_raven_js_plugins_vue___default.a, Vue).install();

window.marked = __webpack_require__(13);

marked.setOptions({
    highlight: function highlight(code) {
        return __webpack_require__(10).highlightAuto(code).value;
    },
    sanitize: true
});

window.axios = __webpack_require__(8);

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

var token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.Pusher = __webpack_require__(15);



window.Echo = new __WEBPACK_IMPORTED_MODULE_2_laravel_echo___default.a({
    broadcaster: 'pusher',
    key: 'af2cda5d9811828831e0'
});
/* WEBPACK VAR INJECTION */}.call(__webpack_exports__, __webpack_require__(3)))

/***/ }),

/***/ 51:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return store; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vuex__ = __webpack_require__(17);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_vue__ = __webpack_require__(4);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_vue__);



__WEBPACK_IMPORTED_MODULE_1_vue___default.a.use(__WEBPACK_IMPORTED_MODULE_0_vuex__["default"]);

var store = new __WEBPACK_IMPORTED_MODULE_0_vuex__["default"].Store({
	state: {
		nots: [],
		posts: [],
		auth_user: {}
	},
	getters: {
		all_nots: function all_nots(state) {
			return state.nots;
		},
		all_nots_count: function all_nots_count(state) {
			return state.nots.length;
		},
		all_posts: function all_posts(state) {
			return state.posts;
		}
	},
	mutations: {
		ADD_NOT: function ADD_NOT(state, not) {
			state.nots.push(not);
		},
		ADD_POST: function ADD_POST(state, post) {
			state.posts.unshift(post);
		},
		AUTH_USER_DATA: function AUTH_USER_DATA(state, user) {
			state.auth_user = user;
		},
		UPDATE_POST_LIKES: function UPDATE_POST_LIKES(state, payload) {
			var post = state.posts.find(function (post) {
				return post.id === payload.id;
			});

			post.likes.push(payload.like);
		},
		UNLIKE_POST: function UNLIKE_POST(state, payload) {
			var post = state.posts.find(function (post) {
				return post.id === payload.post_id;
			});

			var like = post.likes.find(function (like) {
				return like.id === payload.like_id;
			});

			var index = post.likes.indexOf(like);

			post.likes.splice(index, 1);
		}
	},
	actions: {}
});

/***/ }),

/***/ 52:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(6)();
exports.push([module.i, "\n.avatar-like {\n    border-radius: 50%;\n    width: 20px;\n}\n", ""]);

/***/ }),

/***/ 53:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(6)();
exports.push([module.i, "\n.search-avatar {\n    border-radius: 50%;\n    width: 50px;\n}\n", ""]);

/***/ }),

/***/ 54:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(6)();
exports.push([module.i, "\n.avatar-feed {\n\tborder-radius: 50%;\n\twidth: 40px;\n}\n", ""]);

/***/ }),

/***/ 6:
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function() {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		var result = [];
		for(var i = 0; i < this.length; i++) {
			var item = this[i];
			if(item[2]) {
				result.push("@media " + item[2] + "{" + item[1] + "}");
			} else {
				result.push(item[1]);
			}
		}
		return result.join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};


/***/ }),

/***/ 7:
/***/ (function(module, exports, __webpack_require__) {

/*
  MIT License http://www.opensource.org/licenses/mit-license.php
  Author Tobias Koppers @sokra
  Modified by Evan You @yyx990803
*/

var hasDocument = typeof document !== 'undefined'

if (typeof DEBUG !== 'undefined' && DEBUG) {
  if (!hasDocument) {
    throw new Error(
    'vue-style-loader cannot be used in a non-browser environment. ' +
    "Use { target: 'node' } in your Webpack config to indicate a server-rendering environment."
  ) }
}

var listToStyles = __webpack_require__(257)

/*
type StyleObject = {
  id: number;
  parts: Array<StyleObjectPart>
}

type StyleObjectPart = {
  css: string;
  media: string;
  sourceMap: ?string
}
*/

var stylesInDom = {/*
  [id: number]: {
    id: number,
    refs: number,
    parts: Array<(obj?: StyleObjectPart) => void>
  }
*/}

var head = hasDocument && (document.head || document.getElementsByTagName('head')[0])
var singletonElement = null
var singletonCounter = 0
var isProduction = false
var noop = function () {}

// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
// tags it will allow on a page
var isOldIE = typeof navigator !== 'undefined' && /msie [6-9]\b/.test(navigator.userAgent.toLowerCase())

module.exports = function (parentId, list, _isProduction) {
  isProduction = _isProduction

  var styles = listToStyles(parentId, list)
  addStylesToDom(styles)

  return function update (newList) {
    var mayRemove = []
    for (var i = 0; i < styles.length; i++) {
      var item = styles[i]
      var domStyle = stylesInDom[item.id]
      domStyle.refs--
      mayRemove.push(domStyle)
    }
    if (newList) {
      styles = listToStyles(parentId, newList)
      addStylesToDom(styles)
    } else {
      styles = []
    }
    for (var i = 0; i < mayRemove.length; i++) {
      var domStyle = mayRemove[i]
      if (domStyle.refs === 0) {
        for (var j = 0; j < domStyle.parts.length; j++) {
          domStyle.parts[j]()
        }
        delete stylesInDom[domStyle.id]
      }
    }
  }
}

function addStylesToDom (styles /* Array<StyleObject> */) {
  for (var i = 0; i < styles.length; i++) {
    var item = styles[i]
    var domStyle = stylesInDom[item.id]
    if (domStyle) {
      domStyle.refs++
      for (var j = 0; j < domStyle.parts.length; j++) {
        domStyle.parts[j](item.parts[j])
      }
      for (; j < item.parts.length; j++) {
        domStyle.parts.push(addStyle(item.parts[j]))
      }
      if (domStyle.parts.length > item.parts.length) {
        domStyle.parts.length = item.parts.length
      }
    } else {
      var parts = []
      for (var j = 0; j < item.parts.length; j++) {
        parts.push(addStyle(item.parts[j]))
      }
      stylesInDom[item.id] = { id: item.id, refs: 1, parts: parts }
    }
  }
}

function createStyleElement () {
  var styleElement = document.createElement('style')
  styleElement.type = 'text/css'
  head.appendChild(styleElement)
  return styleElement
}

function addStyle (obj /* StyleObjectPart */) {
  var update, remove
  var styleElement = document.querySelector('style[data-vue-ssr-id~="' + obj.id + '"]')

  if (styleElement) {
    if (isProduction) {
      // has SSR styles and in production mode.
      // simply do nothing.
      return noop
    } else {
      // has SSR styles but in dev mode.
      // for some reason Chrome can't handle source map in server-rendered
      // style tags - source maps in <style> only works if the style tag is
      // created and inserted dynamically. So we remove the server rendered
      // styles and inject new ones.
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  if (isOldIE) {
    // use singleton mode for IE9.
    var styleIndex = singletonCounter++
    styleElement = singletonElement || (singletonElement = createStyleElement())
    update = applyToSingletonTag.bind(null, styleElement, styleIndex, false)
    remove = applyToSingletonTag.bind(null, styleElement, styleIndex, true)
  } else {
    // use multi-style-tag mode in all other cases
    styleElement = createStyleElement()
    update = applyToTag.bind(null, styleElement)
    remove = function () {
      styleElement.parentNode.removeChild(styleElement)
    }
  }

  update(obj)

  return function updateStyle (newObj /* StyleObjectPart */) {
    if (newObj) {
      if (newObj.css === obj.css &&
          newObj.media === obj.media &&
          newObj.sourceMap === obj.sourceMap) {
        return
      }
      update(obj = newObj)
    } else {
      remove()
    }
  }
}

var replaceText = (function () {
  var textStore = []

  return function (index, replacement) {
    textStore[index] = replacement
    return textStore.filter(Boolean).join('\n')
  }
})()

function applyToSingletonTag (styleElement, index, remove, obj) {
  var css = remove ? '' : obj.css

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = replaceText(index, css)
  } else {
    var cssNode = document.createTextNode(css)
    var childNodes = styleElement.childNodes
    if (childNodes[index]) styleElement.removeChild(childNodes[index])
    if (childNodes.length) {
      styleElement.insertBefore(cssNode, childNodes[index])
    } else {
      styleElement.appendChild(cssNode)
    }
  }
}

function applyToTag (styleElement, obj) {
  var css = obj.css
  var media = obj.media
  var sourceMap = obj.sourceMap

  if (media) {
    styleElement.setAttribute('media', media)
  }

  if (sourceMap) {
    // https://developer.chrome.com/devtools/docs/javascript-debugging
    // this makes source maps inside style tags work properly in Chrome
    css += '\n/*# sourceURL=' + sourceMap.sources[0] + ' */'
    // http://stackoverflow.com/a/26603875
    css += '\n/*# sourceMappingURL=data:application/json;base64,' + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + ' */'
  }

  if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = css
  } else {
    while (styleElement.firstChild) {
      styleElement.removeChild(styleElement.firstChild)
    }
    styleElement.appendChild(document.createTextNode(css))
  }
}


/***/ })

},[259]);
/*
 Highstock JS v6.1.0 (2018-04-13)

 (c) 2009-2016 Torstein Honsi

 License: www.highcharts.com/license
*/
(function(V, L) {
  "object" === typeof module && module.exports ? module.exports = V.document ? L(V) : L : V.Highcharts = L(V)
})("undefined" !== typeof window ? window : this, function(V) {
  var L = function() {
    var a = "undefined" === typeof V ? window : V,
      B = a.document,
      C = a.navigator && a.navigator.userAgent || "",
      G = B && B.createElementNS && !!B.createElementNS("http://www.w3.org/2000/svg", "svg").createSVGRect,
      p = /(edge|msie|trident)/i.test(C) && !a.opera,
      m = -1 !== C.indexOf("Firefox"),
      g = -1 !== C.indexOf("Chrome"),
      v = m && 4 > parseInt(C.split("Firefox/")[1],
        10);
    return a.Highcharts ? a.Highcharts.error(16, !0) : {
      product: "Highstock",
      version: "6.1.0",
      deg2rad: 2 * Math.PI / 360,
      doc: B,
      hasBidiBug: v,
      hasTouch: B && void 0 !== B.documentElement.ontouchstart,
      isMS: p,
      isWebKit: -1 !== C.indexOf("AppleWebKit"),
      isFirefox: m,
      isChrome: g,
      isSafari: !g && -1 !== C.indexOf("Safari"),
      isTouchDevice: /(Mobile|Android|Windows Phone)/.test(C),
      SVG_NS: "http://www.w3.org/2000/svg",
      chartCount: 0,
      seriesTypes: {},
      symbolSizes: {},
      svg: G,
      win: a,
      marginNames: ["plotTop", "marginRight", "marginBottom", "plotLeft"],
      noop: function() {},
      charts: []
    }
  }();
  (function(a) {
    a.timers = [];
    var B = a.charts,
      C = a.doc,
      G = a.win;
    a.error = function(p, m) {
      p = a.isNumber(p) ? "Highcharts error #" + p + ": www.highcharts.com/errors/" + p : p;
      if (m) throw Error(p);
      G.console && console.log(p)
    };
    a.Fx = function(a, m, g) {
      this.options = m;
      this.elem = a;
      this.prop = g
    };
    a.Fx.prototype = {
      dSetter: function() {
        var a = this.paths[0],
          m = this.paths[1],
          g = [],
          v = this.now,
          z = a.length,
          u;
        if (1 === v) g = this.toD;
        else if (z === m.length && 1 > v)
          for (; z--;) u = parseFloat(a[z]), g[z] = isNaN(u) ? m[z] : v * parseFloat(m[z] - u) + u;
        else g = m;
        this.elem.attr("d",
          g, null, !0)
      },
      update: function() {
        var a = this.elem,
          m = this.prop,
          g = this.now,
          v = this.options.step;
        if (this[m + "Setter"]) this[m + "Setter"]();
        else a.attr ? a.element && a.attr(m, g, null, !0) : a.style[m] = g + this.unit;
        v && v.call(a, g, this)
      },
      run: function(p, m, g) {
        var v = this,
          z = v.options,
          u = function(a) {
            return u.stopped ? !1 : v.step(a)
          },
          y = G.requestAnimationFrame || function(a) {
            setTimeout(a, 13)
          },
          l = function() {
            for (var b = 0; b < a.timers.length; b++) a.timers[b]() || a.timers.splice(b--, 1);
            a.timers.length && y(l)
          };
        p !== m || this.elem["forceAnimate:" +
          this.prop] ? (this.startTime = +new Date, this.start = p, this.end = m, this.unit = g, this.now = this.start, this.pos = 0, u.elem = this.elem, u.prop = this.prop, u() && 1 === a.timers.push(u) && y(l)) : (delete z.curAnim[this.prop], z.complete && 0 === a.keys(z.curAnim).length && z.complete.call(this.elem))
      },
      step: function(p) {
        var m = +new Date,
          g, v = this.options,
          z = this.elem,
          u = v.complete,
          y = v.duration,
          l = v.curAnim;
        z.attr && !z.element ? p = !1 : p || m >= y + this.startTime ? (this.now = this.end, this.pos = 1, this.update(), g = l[this.prop] = !0, a.objectEach(l, function(a) {
          !0 !==
            a && (g = !1)
        }), g && u && u.call(z), p = !1) : (this.pos = v.easing((m - this.startTime) / y), this.now = this.start + (this.end - this.start) * this.pos, this.update(), p = !0);
        return p
      },
      initPath: function(p, m, g) {
        function v(a) {
          var b, f;
          for (c = a.length; c--;) b = "M" === a[c] || "L" === a[c], f = /[a-zA-Z]/.test(a[c + 3]), b && f && a.splice(c + 1, 0, a[c + 1], a[c + 2], a[c + 1], a[c + 2])
        }

        function z(a, b) {
          for (; a.length < n;) {
            a[0] = b[n - a.length];
            var f = a.slice(0, t);
            [].splice.apply(a, [0, 0].concat(f));
            h && (f = a.slice(a.length - t), [].splice.apply(a, [a.length, 0].concat(f)), c--)
          }
          a[0] =
            "M"
        }

        function u(a, b) {
          for (var c = (n - a.length) / t; 0 < c && c--;) f = a.slice().splice(a.length / w - t, t * w), f[0] = b[n - t - c * t], e && (f[t - 6] = f[t - 2], f[t - 5] = f[t - 1]), [].splice.apply(a, [a.length / w, 0].concat(f)), h && c--
        }
        m = m || "";
        var y, l = p.startX,
          b = p.endX,
          e = -1 < m.indexOf("C"),
          t = e ? 7 : 3,
          n, f, c;
        m = m.split(" ");
        g = g.slice();
        var h = p.isArea,
          w = h ? 2 : 1,
          D;
        e && (v(m), v(g));
        if (l && b) {
          for (c = 0; c < l.length; c++)
            if (l[c] === b[0]) {
              y = c;
              break
            } else if (l[0] === b[b.length - l.length + c]) {
            y = c;
            D = !0;
            break
          }
          void 0 === y && (m = [])
        }
        m.length && a.isNumber(y) && (n = g.length + y * w * t,
          D ? (z(m, g), u(g, m)) : (z(g, m), u(m, g)));
        return [m, g]
      }
    };
    a.Fx.prototype.fillSetter = a.Fx.prototype.strokeSetter = function() {
      this.elem.attr(this.prop, a.color(this.start).tweenTo(a.color(this.end), this.pos), null, !0)
    };
    a.merge = function() {
      var p, m = arguments,
        g, v = {},
        z = function(g, y) {
          "object" !== typeof g && (g = {});
          a.objectEach(y, function(l, b) {
            !a.isObject(l, !0) || a.isClass(l) || a.isDOMElement(l) ? g[b] = y[b] : g[b] = z(g[b] || {}, l)
          });
          return g
        };
      !0 === m[0] && (v = m[1], m = Array.prototype.slice.call(m, 2));
      g = m.length;
      for (p = 0; p < g; p++) v = z(v,
        m[p]);
      return v
    };
    a.pInt = function(a, m) {
      return parseInt(a, m || 10)
    };
    a.isString = function(a) {
      return "string" === typeof a
    };
    a.isArray = function(a) {
      a = Object.prototype.toString.call(a);
      return "[object Array]" === a || "[object Array Iterator]" === a
    };
    a.isObject = function(p, m) {
      return !!p && "object" === typeof p && (!m || !a.isArray(p))
    };
    a.isDOMElement = function(p) {
      return a.isObject(p) && "number" === typeof p.nodeType
    };
    a.isClass = function(p) {
      var m = p && p.constructor;
      return !(!a.isObject(p, !0) || a.isDOMElement(p) || !m || !m.name || "Object" ===
        m.name)
    };
    a.isNumber = function(a) {
      return "number" === typeof a && !isNaN(a) && Infinity > a && -Infinity < a
    };
    a.erase = function(a, m) {
      for (var g = a.length; g--;)
        if (a[g] === m) {
          a.splice(g, 1);
          break
        }
    };
    a.defined = function(a) {
      return void 0 !== a && null !== a
    };
    a.attr = function(p, m, g) {
      var v;
      a.isString(m) ? a.defined(g) ? p.setAttribute(m, g) : p && p.getAttribute && ((v = p.getAttribute(m)) || "class" !== m || (v = p.getAttribute(m + "Name"))) : a.defined(m) && a.isObject(m) && a.objectEach(m, function(a, g) {
        p.setAttribute(g, a)
      });
      return v
    };
    a.splat = function(p) {
      return a.isArray(p) ?
        p : [p]
    };
    a.syncTimeout = function(a, m, g) {
      if (m) return setTimeout(a, m, g);
      a.call(0, g)
    };
    a.clearTimeout = function(p) {
      a.defined(p) && clearTimeout(p)
    };
    a.extend = function(a, m) {
      var g;
      a || (a = {});
      for (g in m) a[g] = m[g];
      return a
    };
    a.pick = function() {
      var a = arguments,
        m, g, v = a.length;
      for (m = 0; m < v; m++)
        if (g = a[m], void 0 !== g && null !== g) return g
    };
    a.css = function(p, m) {
      a.isMS && !a.svg && m && void 0 !== m.opacity && (m.filter = "alpha(opacity\x3d" + 100 * m.opacity + ")");
      a.extend(p.style, m)
    };
    a.createElement = function(p, m, g, v, z) {
      p = C.createElement(p);
      var u =
        a.css;
      m && a.extend(p, m);
      z && u(p, {
        padding: 0,
        border: "none",
        margin: 0
      });
      g && u(p, g);
      v && v.appendChild(p);
      return p
    };
    a.extendClass = function(p, m) {
      var g = function() {};
      g.prototype = new p;
      a.extend(g.prototype, m);
      return g
    };
    a.pad = function(a, m, g) {
      return Array((m || 2) + 1 - String(a).replace("-", "").length).join(g || 0) + a
    };
    a.relativeLength = function(a, m, g) {
      return /%$/.test(a) ? m * parseFloat(a) / 100 + (g || 0) : parseFloat(a)
    };
    a.wrap = function(a, m, g) {
      var v = a[m];
      a[m] = function() {
        var a = Array.prototype.slice.call(arguments),
          u = arguments,
          y = this;
        y.proceed = function() {
          v.apply(y, arguments.length ? arguments : u)
        };
        a.unshift(v);
        a = g.apply(this, a);
        y.proceed = null;
        return a
      }
    };
    a.formatSingle = function(p, m, g) {
      var v = /\.([0-9])/,
        z = a.defaultOptions.lang;
      /f$/.test(p) ? (g = (g = p.match(v)) ? g[1] : -1, null !== m && (m = a.numberFormat(m, g, z.decimalPoint, -1 < p.indexOf(",") ? z.thousandsSep : ""))) : m = (g || a.time).dateFormat(p, m);
      return m
    };
    a.format = function(p, m, g) {
      for (var v = "{", z = !1, u, y, l, b, e = [], t; p;) {
        v = p.indexOf(v);
        if (-1 === v) break;
        u = p.slice(0, v);
        if (z) {
          u = u.split(":");
          y = u.shift().split(".");
          b = y.length;
          t = m;
          for (l = 0; l < b; l++) t && (t = t[y[l]]);
          u.length && (t = a.formatSingle(u.join(":"), t, g));
          e.push(t)
        } else e.push(u);
        p = p.slice(v + 1);
        v = (z = !z) ? "}" : "{"
      }
      e.push(p);
      return e.join("")
    };
    a.getMagnitude = function(a) {
      return Math.pow(10, Math.floor(Math.log(a) / Math.LN10))
    };
    a.normalizeTickInterval = function(p, m, g, v, z) {
      var u, y = p;
      g = a.pick(g, 1);
      u = p / g;
      m || (m = z ? [1, 1.2, 1.5, 2, 2.5, 3, 4, 5, 6, 8, 10] : [1, 2, 2.5, 5, 10], !1 === v && (1 === g ? m = a.grep(m, function(a) {
        return 0 === a % 1
      }) : .1 >= g && (m = [1 / g])));
      for (v = 0; v < m.length && !(y = m[v], z && y * g >= p ||
          !z && u <= (m[v] + (m[v + 1] || m[v])) / 2); v++);
      return y = a.correctFloat(y * g, -Math.round(Math.log(.001) / Math.LN10))
    };
    a.stableSort = function(a, m) {
      var g = a.length,
        v, z;
      for (z = 0; z < g; z++) a[z].safeI = z;
      a.sort(function(a, g) {
        v = m(a, g);
        return 0 === v ? a.safeI - g.safeI : v
      });
      for (z = 0; z < g; z++) delete a[z].safeI
    };
    a.arrayMin = function(a) {
      for (var m = a.length, g = a[0]; m--;) a[m] < g && (g = a[m]);
      return g
    };
    a.arrayMax = function(a) {
      for (var m = a.length, g = a[0]; m--;) a[m] > g && (g = a[m]);
      return g
    };
    a.destroyObjectProperties = function(p, m) {
      a.objectEach(p, function(a,
        v) {
        a && a !== m && a.destroy && a.destroy();
        delete p[v]
      })
    };
    a.discardElement = function(p) {
      var m = a.garbageBin;
      m || (m = a.createElement("div"));
      p && m.appendChild(p);
      m.innerHTML = ""
    };
    a.correctFloat = function(a, m) {
      return parseFloat(a.toPrecision(m || 14))
    };
    a.setAnimation = function(p, m) {
      m.renderer.globalAnimation = a.pick(p, m.options.chart.animation, !0)
    };
    a.animObject = function(p) {
      return a.isObject(p) ? a.merge(p) : {
        duration: p ? 500 : 0
      }
    };
    a.timeUnits = {
      millisecond: 1,
      second: 1E3,
      minute: 6E4,
      hour: 36E5,
      day: 864E5,
      week: 6048E5,
      month: 24192E5,
      year: 314496E5
    };
    a.numberFormat = function(p, m, g, v) {
      p = +p || 0;
      m = +m;
      var z = a.defaultOptions.lang,
        u = (p.toString().split(".")[1] || "").split("e")[0].length,
        y, l, b = p.toString().split("e"); - 1 === m ? m = Math.min(u, 20) : a.isNumber(m) ? m && b[1] && 0 > b[1] && (y = m + +b[1], 0 <= y ? (b[0] = (+b[0]).toExponential(y).split("e")[0], m = y) : (b[0] = b[0].split(".")[0] || 0, p = 20 > m ? (b[0] * Math.pow(10, b[1])).toFixed(m) : 0, b[1] = 0)) : m = 2;
      l = (Math.abs(b[1] ? b[0] : p) + Math.pow(10, -Math.max(m, u) - 1)).toFixed(m);
      u = String(a.pInt(l));
      y = 3 < u.length ? u.length % 3 : 0;
      g = a.pick(g,
        z.decimalPoint);
      v = a.pick(v, z.thousandsSep);
      p = (0 > p ? "-" : "") + (y ? u.substr(0, y) + v : "");
      p += u.substr(y).replace(/(\d{3})(?=\d)/g, "$1" + v);
      m && (p += g + l.slice(-m));
      b[1] && 0 !== +p && (p += "e" + b[1]);
      return p
    };
    Math.easeInOutSine = function(a) {
      return -.5 * (Math.cos(Math.PI * a) - 1)
    };
    a.getStyle = function(p, m, g) {
      if ("width" === m) return Math.min(p.offsetWidth, p.scrollWidth) - a.getStyle(p, "padding-left") - a.getStyle(p, "padding-right");
      if ("height" === m) return Math.min(p.offsetHeight, p.scrollHeight) - a.getStyle(p, "padding-top") - a.getStyle(p,
        "padding-bottom");
      G.getComputedStyle || a.error(27, !0);
      if (p = G.getComputedStyle(p, void 0)) p = p.getPropertyValue(m), a.pick(g, "opacity" !== m) && (p = a.pInt(p));
      return p
    };
    a.inArray = function(p, m, g) {
      return (a.indexOfPolyfill || Array.prototype.indexOf).call(m, p, g)
    };
    a.grep = function(p, m) {
      return (a.filterPolyfill || Array.prototype.filter).call(p, m)
    };
    a.find = Array.prototype.find ? function(a, m) {
      return a.find(m)
    } : function(a, m) {
      var g, v = a.length;
      for (g = 0; g < v; g++)
        if (m(a[g], g)) return a[g]
    };
    a.some = function(p, m, g) {
      return (a.somePolyfill ||
        Array.prototype.some).call(p, m, g)
    };
    a.map = function(a, m) {
      for (var g = [], v = 0, z = a.length; v < z; v++) g[v] = m.call(a[v], a[v], v, a);
      return g
    };
    a.keys = function(p) {
      return (a.keysPolyfill || Object.keys).call(void 0, p)
    };
    a.reduce = function(p, m, g) {
      return (a.reducePolyfill || Array.prototype.reduce).call(p, m, g)
    };
    a.offset = function(a) {
      var m = C.documentElement;
      a = a.parentElement ? a.getBoundingClientRect() : {
        top: 0,
        left: 0
      };
      return {
        top: a.top + (G.pageYOffset || m.scrollTop) - (m.clientTop || 0),
        left: a.left + (G.pageXOffset || m.scrollLeft) - (m.clientLeft ||
          0)
      }
    };
    a.stop = function(p, m) {
      for (var g = a.timers.length; g--;) a.timers[g].elem !== p || m && m !== a.timers[g].prop || (a.timers[g].stopped = !0)
    };
    a.each = function(p, m, g) {
      return (a.forEachPolyfill || Array.prototype.forEach).call(p, m, g)
    };
    a.objectEach = function(a, m, g) {
      for (var v in a) a.hasOwnProperty(v) && m.call(g || a[v], a[v], v, a)
    };
    a.addEvent = function(p, m, g) {
      var v, z = p.addEventListener || a.addEventListenerPolyfill;
      v = "function" === typeof p && p.prototype ? p.prototype.protoEvents = p.prototype.protoEvents || {} : p.hcEvents = p.hcEvents || {};
      z && z.call(p, m, g, !1);
      v[m] || (v[m] = []);
      v[m].push(g);
      return function() {
        a.removeEvent(p, m, g)
      }
    };
    a.removeEvent = function(p, m, g) {
      function v(l, b) {
        var e = p.removeEventListener || a.removeEventListenerPolyfill;
        e && e.call(p, l, b, !1)
      }

      function z(l) {
        var b, e;
        p.nodeName && (m ? (b = {}, b[m] = !0) : b = l, a.objectEach(b, function(a, b) {
          if (l[b])
            for (e = l[b].length; e--;) v(b, l[b][e])
        }))
      }
      var u, y;
      a.each(["protoEvents", "hcEvents"], function(l) {
        var b = p[l];
        b && (m ? (u = b[m] || [], g ? (y = a.inArray(g, u), -1 < y && (u.splice(y, 1), b[m] = u), v(m, g)) : (z(b), b[m] = [])) : (z(b), p[l] = {}))
      })
    };
    a.fireEvent = function(p, m, g, v) {
      var z, u, y, l, b;
      g = g || {};
      C.createEvent && (p.dispatchEvent || p.fireEvent) ? (z = C.createEvent("Events"), z.initEvent(m, !0, !0), a.extend(z, g), p.dispatchEvent ? p.dispatchEvent(z) : p.fireEvent(m, z)) : a.each(["protoEvents", "hcEvents"], function(e) {
        if (p[e])
          for (u = p[e][m] || [], y = u.length, g.target || a.extend(g, {
              preventDefault: function() {
                g.defaultPrevented = !0
              },
              target: p,
              type: m
            }), l = 0; l < y; l++)(b = u[l]) && !1 === b.call(p, g) && g.preventDefault()
      });
      v && !g.defaultPrevented && v.call(p,
        g)
    };
    a.animate = function(p, m, g) {
      var v, z = "",
        u, y, l;
      a.isObject(g) || (l = arguments, g = {
        duration: l[2],
        easing: l[3],
        complete: l[4]
      });
      a.isNumber(g.duration) || (g.duration = 400);
      g.easing = "function" === typeof g.easing ? g.easing : Math[g.easing] || Math.easeInOutSine;
      g.curAnim = a.merge(m);
      a.objectEach(m, function(b, e) {
        a.stop(p, e);
        y = new a.Fx(p, g, e);
        u = null;
        "d" === e ? (y.paths = y.initPath(p, p.d, m.d), y.toD = m.d, v = 0, u = 1) : p.attr ? v = p.attr(e) : (v = parseFloat(a.getStyle(p, e)) || 0, "opacity" !== e && (z = "px"));
        u || (u = b);
        u && u.match && u.match("px") &&
          (u = u.replace(/px/g, ""));
        y.run(v, u, z)
      })
    };
    a.seriesType = function(p, m, g, v, z) {
      var u = a.getOptions(),
        y = a.seriesTypes;
      u.plotOptions[p] = a.merge(u.plotOptions[m], g);
      y[p] = a.extendClass(y[m] || function() {}, v);
      y[p].prototype.type = p;
      z && (y[p].prototype.pointClass = a.extendClass(a.Point, z));
      return y[p]
    };
    a.uniqueKey = function() {
      var a = Math.random().toString(36).substring(2, 9),
        m = 0;
      return function() {
        return "highcharts-" + a + "-" + m++
      }
    }();
    G.jQuery && (G.jQuery.fn.highcharts = function() {
      var p = [].slice.call(arguments);
      if (this[0]) return p[0] ?
        (new(a[a.isString(p[0]) ? p.shift() : "Chart"])(this[0], p[0], p[1]), this) : B[a.attr(this[0], "data-highcharts-chart")]
    })
  })(L);
  (function(a) {
    var B = a.each,
      C = a.isNumber,
      G = a.map,
      p = a.merge,
      m = a.pInt;
    a.Color = function(g) {
      if (!(this instanceof a.Color)) return new a.Color(g);
      this.init(g)
    };
    a.Color.prototype = {
      parsers: [{
        regex: /rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]?(?:\.[0-9]+)?)\s*\)/,
        parse: function(a) {
          return [m(a[1]), m(a[2]), m(a[3]), parseFloat(a[4], 10)]
        }
      }, {
        regex: /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/,
        parse: function(a) {
          return [m(a[1]), m(a[2]), m(a[3]), 1]
        }
      }],
      names: {
        none: "rgba(255,255,255,0)",
        white: "#ffffff",
        black: "#000000"
      },
      init: function(g) {
        var m, z, u, y;
        if ((this.input = g = this.names[g && g.toLowerCase ? g.toLowerCase() : ""] || g) && g.stops) this.stops = G(g.stops, function(l) {
          return new a.Color(l[1])
        });
        else if (g && g.charAt && "#" === g.charAt() && (m = g.length, g = parseInt(g.substr(1), 16), 7 === m ? z = [(g & 16711680) >> 16, (g & 65280) >> 8, g & 255, 1] : 4 === m && (z = [(g & 3840) >> 4 | (g & 3840) >> 8, (g & 240) >> 4 | g & 240, (g & 15) << 4 | g & 15, 1])), !z)
          for (u = this.parsers.length; u-- &&
            !z;) y = this.parsers[u], (m = y.regex.exec(g)) && (z = y.parse(m));
        this.rgba = z || []
      },
      get: function(a) {
        var g = this.input,
          m = this.rgba,
          u;
        this.stops ? (u = p(g), u.stops = [].concat(u.stops), B(this.stops, function(g, l) {
          u.stops[l] = [u.stops[l][0], g.get(a)]
        })) : u = m && C(m[0]) ? "rgb" === a || !a && 1 === m[3] ? "rgb(" + m[0] + "," + m[1] + "," + m[2] + ")" : "a" === a ? m[3] : "rgba(" + m.join(",") + ")" : g;
        return u
      },
      brighten: function(a) {
        var g, z = this.rgba;
        if (this.stops) B(this.stops, function(g) {
          g.brighten(a)
        });
        else if (C(a) && 0 !== a)
          for (g = 0; 3 > g; g++) z[g] += m(255 * a), 0 >
            z[g] && (z[g] = 0), 255 < z[g] && (z[g] = 255);
        return this
      },
      setOpacity: function(a) {
        this.rgba[3] = a;
        return this
      },
      tweenTo: function(a, m) {
        var g = this.rgba,
          u = a.rgba;
        u.length && g && g.length ? (a = 1 !== u[3] || 1 !== g[3], m = (a ? "rgba(" : "rgb(") + Math.round(u[0] + (g[0] - u[0]) * (1 - m)) + "," + Math.round(u[1] + (g[1] - u[1]) * (1 - m)) + "," + Math.round(u[2] + (g[2] - u[2]) * (1 - m)) + (a ? "," + (u[3] + (g[3] - u[3]) * (1 - m)) : "") + ")") : m = a.input || "none";
        return m
      }
    };
    a.color = function(g) {
      return new a.Color(g)
    }
  })(L);
  (function(a) {
    var B, C, G = a.addEvent,
      p = a.animate,
      m = a.attr,
      g = a.charts,
      v = a.color,
      z = a.css,
      u = a.createElement,
      y = a.defined,
      l = a.deg2rad,
      b = a.destroyObjectProperties,
      e = a.doc,
      t = a.each,
      n = a.extend,
      f = a.erase,
      c = a.grep,
      h = a.hasTouch,
      w = a.inArray,
      D = a.isArray,
      r = a.isFirefox,
      J = a.isMS,
      q = a.isObject,
      F = a.isString,
      x = a.isWebKit,
      K = a.merge,
      d = a.noop,
      H = a.objectEach,
      E = a.pick,
      k = a.pInt,
      A = a.removeEvent,
      P = a.stop,
      R = a.svg,
      I = a.SVG_NS,
      Q = a.symbolSizes,
      N = a.win;
    B = a.SVGElement = function() {
      return this
    };
    n(B.prototype, {
      opacity: 1,
      SVG_NS: I,
      textProps: "direction fontSize fontWeight fontFamily fontStyle color lineHeight width textAlign textDecoration textOverflow textOutline".split(" "),
      init: function(a, k) {
        this.element = "span" === k ? u(k) : e.createElementNS(this.SVG_NS, k);
        this.renderer = a
      },
      animate: function(k, d, A) {
        d = a.animObject(E(d, this.renderer.globalAnimation, !0));
        0 !== d.duration ? (A && (d.complete = A), p(this, k, d)) : (this.attr(k, null, A), d.step && d.step.call(this));
        return this
      },
      complexColor: function(k, d, A) {
        var M = this.renderer,
          b, f, c, h, I, x, n, r, e, w, E, q = [],
          l;
        a.fireEvent(this.renderer, "complexColor", {
          args: arguments
        }, function() {
          k.radialGradient ? f = "radialGradient" : k.linearGradient && (f = "linearGradient");
          f && (c = k[f], I = M.gradients, n = k.stops, w = A.radialReference, D(c) && (k[f] = c = {
            x1: c[0],
            y1: c[1],
            x2: c[2],
            y2: c[3],
            gradientUnits: "userSpaceOnUse"
          }), "radialGradient" === f && w && !y(c.gradientUnits) && (h = c, c = K(c, M.getRadialAttr(w, h), {
            gradientUnits: "userSpaceOnUse"
          })), H(c, function(a, k) {
            "id" !== k && q.push(k, a)
          }), H(n, function(a) {
            q.push(a)
          }), q = q.join(","), I[q] ? E = I[q].attr("id") : (c.id = E = a.uniqueKey(), I[q] = x = M.createElement(f).attr(c).add(M.defs), x.radAttr = h, x.stops = [], t(n, function(k) {
            0 === k[1].indexOf("rgba") ? (b = a.color(k[1]),
              r = b.get("rgb"), e = b.get("a")) : (r = k[1], e = 1);
            k = M.createElement("stop").attr({
              offset: k[0],
              "stop-color": r,
              "stop-opacity": e
            }).add(x);
            x.stops.push(k)
          })), l = "url(" + M.url + "#" + E + ")", A.setAttribute(d, l), A.gradient = q, k.toString = function() {
            return l
          })
        })
      },
      applyTextOutline: function(k) {
        var d = this.element,
          M, A, b, c, h; - 1 !== k.indexOf("contrast") && (k = k.replace(/contrast/g, this.renderer.getContrast(d.style.fill)));
        k = k.split(" ");
        A = k[k.length - 1];
        if ((b = k[0]) && "none" !== b && a.svg) {
          this.fakeTS = !0;
          k = [].slice.call(d.getElementsByTagName("tspan"));
          this.ySetter = this.xSetter;
          b = b.replace(/(^[\d\.]+)(.*?)$/g, function(a, k, d) {
            return 2 * k + d
          });
          for (h = k.length; h--;) M = k[h], "highcharts-text-outline" === M.getAttribute("class") && f(k, d.removeChild(M));
          c = d.firstChild;
          t(k, function(a, k) {
            0 === k && (a.setAttribute("x", d.getAttribute("x")), k = d.getAttribute("y"), a.setAttribute("y", k || 0), null === k && d.setAttribute("y", 0));
            a = a.cloneNode(1);
            m(a, {
              "class": "highcharts-text-outline",
              fill: A,
              stroke: A,
              "stroke-width": b,
              "stroke-linejoin": "round"
            });
            d.insertBefore(a, c)
          })
        }
      },
      attr: function(a,
        k, d, A) {
        var M, b = this.element,
          f, c = this,
          h, I;
        "string" === typeof a && void 0 !== k && (M = a, a = {}, a[M] = k);
        "string" === typeof a ? c = (this[a + "Getter"] || this._defaultGetter).call(this, a, b) : (H(a, function(k, d) {
          h = !1;
          A || P(this, d);
          this.symbolName && /^(x|y|width|height|r|start|end|innerR|anchorX|anchorY)$/.test(d) && (f || (this.symbolAttr(a), f = !0), h = !0);
          !this.rotation || "x" !== d && "y" !== d || (this.doTransform = !0);
          h || (I = this[d + "Setter"] || this._defaultSetter, I.call(this, k, d, b), this.shadows && /^(width|height|visibility|x|y|d|transform|cx|cy|r)$/.test(d) &&
            this.updateShadows(d, k, I))
        }, this), this.afterSetters());
        d && d.call(this);
        return c
      },
      afterSetters: function() {
        this.doTransform && (this.updateTransform(), this.doTransform = !1)
      },
      updateShadows: function(a, k, d) {
        for (var M = this.shadows, A = M.length; A--;) d.call(M[A], "height" === a ? Math.max(k - (M[A].cutHeight || 0), 0) : "d" === a ? this.d : k, a, M[A])
      },
      addClass: function(a, k) {
        var d = this.attr("class") || ""; - 1 === d.indexOf(a) && (k || (a = (d + (d ? " " : "") + a).replace("  ", " ")), this.attr("class", a));
        return this
      },
      hasClass: function(a) {
        return -1 !==
          w(a, (this.attr("class") || "").split(" "))
      },
      removeClass: function(a) {
        return this.attr("class", (this.attr("class") || "").replace(a, ""))
      },
      symbolAttr: function(a) {
        var k = this;
        t("x y r start end width height innerR anchorX anchorY".split(" "), function(d) {
          k[d] = E(a[d], k[d])
        });
        k.attr({
          d: k.renderer.symbols[k.symbolName](k.x, k.y, k.width, k.height, k)
        })
      },
      clip: function(a) {
        return this.attr("clip-path", a ? "url(" + this.renderer.url + "#" + a.id + ")" : "none")
      },
      crisp: function(a, k) {
        var d;
        k = k || a.strokeWidth || 0;
        d = Math.round(k) % 2 / 2;
        a.x = Math.floor(a.x || this.x || 0) + d;
        a.y = Math.floor(a.y || this.y || 0) + d;
        a.width = Math.floor((a.width || this.width || 0) - 2 * d);
        a.height = Math.floor((a.height || this.height || 0) - 2 * d);
        y(a.strokeWidth) && (a.strokeWidth = k);
        return a
      },
      css: function(a) {
        var d = this.styles,
          A = {},
          b = this.element,
          f, c = "",
          M, h = !d,
          I = ["textOutline", "textOverflow", "width"];
        a && a.color && (a.fill = a.color);
        d && H(a, function(a, k) {
          a !== d[k] && (A[k] = a, h = !0)
        });
        h && (d && (a = n(d, A)), f = this.textWidth = a && a.width && "auto" !== a.width && "text" === b.nodeName.toLowerCase() && k(a.width),
          this.styles = a, f && !R && this.renderer.forExport && delete a.width, b.namespaceURI === this.SVG_NS ? (M = function(a, k) {
            return "-" + k.toLowerCase()
          }, H(a, function(a, k) {
            -1 === w(k, I) && (c += k.replace(/([A-Z])/g, M) + ":" + a + ";")
          }), c && m(b, "style", c)) : z(b, a), this.added && ("text" === this.element.nodeName && this.renderer.buildText(this), a && a.textOutline && this.applyTextOutline(a.textOutline)));
        return this
      },
      strokeWidth: function() {
        return this["stroke-width"] || 0
      },
      on: function(a, k) {
        var d = this,
          A = d.element;
        h && "click" === a ? (A.ontouchstart =
          function(a) {
            d.touchEventFired = Date.now();
            a.preventDefault();
            k.call(A, a)
          }, A.onclick = function(a) {
            (-1 === N.navigator.userAgent.indexOf("Android") || 1100 < Date.now() - (d.touchEventFired || 0)) && k.call(A, a)
          }) : A["on" + a] = k;
        return this
      },
      setRadialReference: function(a) {
        var k = this.renderer.gradients[this.element.gradient];
        this.element.radialReference = a;
        k && k.radAttr && k.animate(this.renderer.getRadialAttr(a, k.radAttr));
        return this
      },
      translate: function(a, k) {
        return this.attr({
          translateX: a,
          translateY: k
        })
      },
      invert: function(a) {
        this.inverted =
          a;
        this.updateTransform();
        return this
      },
      updateTransform: function() {
        var a = this.translateX || 0,
          k = this.translateY || 0,
          d = this.scaleX,
          A = this.scaleY,
          b = this.inverted,
          f = this.rotation,
          c = this.matrix,
          h = this.element;
        b && (a += this.width, k += this.height);
        a = ["translate(" + a + "," + k + ")"];
        y(c) && a.push("matrix(" + c.join(",") + ")");
        b ? a.push("rotate(90) scale(-1,1)") : f && a.push("rotate(" + f + " " + E(this.rotationOriginX, h.getAttribute("x"), 0) + " " + E(this.rotationOriginY, h.getAttribute("y") || 0) + ")");
        (y(d) || y(A)) && a.push("scale(" + E(d, 1) +
          " " + E(A, 1) + ")");
        a.length && h.setAttribute("transform", a.join(" "))
      },
      toFront: function() {
        var a = this.element;
        a.parentNode.appendChild(a);
        return this
      },
      align: function(a, k, d) {
        var A, b, c, h, M = {};
        b = this.renderer;
        c = b.alignedObjects;
        var I, x;
        if (a) {
          if (this.alignOptions = a, this.alignByTranslate = k, !d || F(d)) this.alignTo = A = d || "renderer", f(c, this), c.push(this), d = null
        } else a = this.alignOptions, k = this.alignByTranslate, A = this.alignTo;
        d = E(d, b[A], b);
        A = a.align;
        b = a.verticalAlign;
        c = (d.x || 0) + (a.x || 0);
        h = (d.y || 0) + (a.y || 0);
        "right" ===
        A ? I = 1 : "center" === A && (I = 2);
        I && (c += (d.width - (a.width || 0)) / I);
        M[k ? "translateX" : "x"] = Math.round(c);
        "bottom" === b ? x = 1 : "middle" === b && (x = 2);
        x && (h += (d.height - (a.height || 0)) / x);
        M[k ? "translateY" : "y"] = Math.round(h);
        this[this.placed ? "animate" : "attr"](M);
        this.placed = !0;
        this.alignAttr = M;
        return this
      },
      getBBox: function(a, k) {
        var d, A = this.renderer,
          b, c = this.element,
          f = this.styles,
          h, I = this.textStr,
          M, x = A.cache,
          r = A.cacheKeys,
          e;
        k = E(k, this.rotation);
        b = k * l;
        h = f && f.fontSize;
        y(I) && (e = I.toString(), -1 === e.indexOf("\x3c") && (e = e.replace(/[0-9]/g,
          "0")), e += ["", k || 0, h, this.textWidth, f && f.textOverflow].join());
        e && !a && (d = x[e]);
        if (!d) {
          if (c.namespaceURI === this.SVG_NS || A.forExport) {
            try {
              (M = this.fakeTS && function(a) {
                t(c.querySelectorAll(".highcharts-text-outline"), function(k) {
                  k.style.display = a
                })
              }) && M("none"), d = c.getBBox ? n({}, c.getBBox()) : {
                width: c.offsetWidth,
                height: c.offsetHeight
              }, M && M("")
            } catch (fa) {}
            if (!d || 0 > d.width) d = {
              width: 0,
              height: 0
            }
          } else d = this.htmlGetBBox();
          A.isSVG && (a = d.width, A = d.height, f && "11px" === f.fontSize && 17 === Math.round(A) && (d.height = A =
            14), k && (d.width = Math.abs(A * Math.sin(b)) + Math.abs(a * Math.cos(b)), d.height = Math.abs(A * Math.cos(b)) + Math.abs(a * Math.sin(b))));
          if (e && 0 < d.height) {
            for (; 250 < r.length;) delete x[r.shift()];
            x[e] || r.push(e);
            x[e] = d
          }
        }
        return d
      },
      show: function(a) {
        return this.attr({
          visibility: a ? "inherit" : "visible"
        })
      },
      hide: function() {
        return this.attr({
          visibility: "hidden"
        })
      },
      fadeOut: function(a) {
        var k = this;
        k.animate({
          opacity: 0
        }, {
          duration: a || 150,
          complete: function() {
            k.attr({
              y: -9999
            })
          }
        })
      },
      add: function(a) {
        var k = this.renderer,
          d = this.element,
          A;
        a && (this.parentGroup = a);
        this.parentInverted = a && a.inverted;
        void 0 !== this.textStr && k.buildText(this);
        this.added = !0;
        if (!a || a.handleZ || this.zIndex) A = this.zIndexSetter();
        A || (a ? a.element : k.box).appendChild(d);
        if (this.onAdd) this.onAdd();
        return this
      },
      safeRemoveChild: function(a) {
        var k = a.parentNode;
        k && k.removeChild(a)
      },
      destroy: function() {
        var a = this,
          k = a.element || {},
          d = a.renderer.isSVG && "SPAN" === k.nodeName && a.parentGroup,
          A = k.ownerSVGElement,
          b = a.clipPath;
        k.onclick = k.onmouseout = k.onmouseover = k.onmousemove = k.point =
          null;
        P(a);
        b && A && (t(A.querySelectorAll("[clip-path],[CLIP-PATH]"), function(a) {
          var k = a.getAttribute("clip-path"),
            d = b.element.id;
          (-1 < k.indexOf("(#" + d + ")") || -1 < k.indexOf('("#' + d + '")')) && a.removeAttribute("clip-path")
        }), a.clipPath = b.destroy());
        if (a.stops) {
          for (A = 0; A < a.stops.length; A++) a.stops[A] = a.stops[A].destroy();
          a.stops = null
        }
        a.safeRemoveChild(k);
        for (a.destroyShadows(); d && d.div && 0 === d.div.childNodes.length;) k = d.parentGroup, a.safeRemoveChild(d.div), delete d.div, d = k;
        a.alignTo && f(a.renderer.alignedObjects,
          a);
        H(a, function(k, d) {
          delete a[d]
        });
        return null
      },
      shadow: function(a, k, d) {
        var A = [],
          b, c, f = this.element,
          h, I, x, n;
        if (!a) this.destroyShadows();
        else if (!this.shadows) {
          I = E(a.width, 3);
          x = (a.opacity || .15) / I;
          n = this.parentInverted ? "(-1,-1)" : "(" + E(a.offsetX, 1) + ", " + E(a.offsetY, 1) + ")";
          for (b = 1; b <= I; b++) c = f.cloneNode(0), h = 2 * I + 1 - 2 * b, m(c, {
              isShadow: "true",
              stroke: a.color || "#000000",
              "stroke-opacity": x * b,
              "stroke-width": h,
              transform: "translate" + n,
              fill: "none"
            }), d && (m(c, "height", Math.max(m(c, "height") - h, 0)), c.cutHeight = h), k ?
            k.element.appendChild(c) : f.parentNode && f.parentNode.insertBefore(c, f), A.push(c);
          this.shadows = A
        }
        return this
      },
      destroyShadows: function() {
        t(this.shadows || [], function(a) {
          this.safeRemoveChild(a)
        }, this);
        this.shadows = void 0
      },
      xGetter: function(a) {
        "circle" === this.element.nodeName && ("x" === a ? a = "cx" : "y" === a && (a = "cy"));
        return this._defaultGetter(a)
      },
      _defaultGetter: function(a) {
        a = E(this[a + "Value"], this[a], this.element ? this.element.getAttribute(a) : null, 0);
        /^[\-0-9\.]+$/.test(a) && (a = parseFloat(a));
        return a
      },
      dSetter: function(a,
        k, d) {
        a && a.join && (a = a.join(" "));
        /(NaN| {2}|^$)/.test(a) && (a = "M 0 0");
        this[k] !== a && (d.setAttribute(k, a), this[k] = a)
      },
      dashstyleSetter: function(a) {
        var d, A = this["stroke-width"];
        "inherit" === A && (A = 1);
        if (a = a && a.toLowerCase()) {
          a = a.replace("shortdashdotdot", "3,1,1,1,1,1,").replace("shortdashdot", "3,1,1,1").replace("shortdot", "1,1,").replace("shortdash", "3,1,").replace("longdash", "8,3,").replace(/dot/g, "1,3,").replace("dash", "4,3,").replace(/,$/, "").split(",");
          for (d = a.length; d--;) a[d] = k(a[d]) * A;
          a = a.join(",").replace(/NaN/g,
            "none");
          this.element.setAttribute("stroke-dasharray", a)
        }
      },
      alignSetter: function(a) {
        this.alignValue = a;
        this.element.setAttribute("text-anchor", {
          left: "start",
          center: "middle",
          right: "end"
        }[a])
      },
      opacitySetter: function(a, k, d) {
        this[k] = a;
        d.setAttribute(k, a)
      },
      titleSetter: function(a) {
        var k = this.element.getElementsByTagName("title")[0];
        k || (k = e.createElementNS(this.SVG_NS, "title"), this.element.appendChild(k));
        k.firstChild && k.removeChild(k.firstChild);
        k.appendChild(e.createTextNode(String(E(a), "").replace(/<[^>]*>/g,
          "").replace(/&lt;/g, "\x3c").replace(/&gt;/g, "\x3e")))
      },
      textSetter: function(a) {
        a !== this.textStr && (delete this.bBox, this.textStr = a, this.added && this.renderer.buildText(this))
      },
      fillSetter: function(a, k, d) {
        "string" === typeof a ? d.setAttribute(k, a) : a && this.complexColor(a, k, d)
      },
      visibilitySetter: function(a, k, d) {
        "inherit" === a ? d.removeAttribute(k) : this[k] !== a && d.setAttribute(k, a);
        this[k] = a
      },
      zIndexSetter: function(a, d) {
        var A = this.renderer,
          b = this.parentGroup,
          c = (b || A).element || A.box,
          f, h = this.element,
          I, x, A = c === A.box;
        f = this.added;
        var n;
        y(a) && (h.zIndex = a, a = +a, this[d] === a && (f = !1), this[d] = a);
        if (f) {
          (a = this.zIndex) && b && (b.handleZ = !0);
          d = c.childNodes;
          for (n = d.length - 1; 0 <= n && !I; n--)
            if (b = d[n], f = b.zIndex, x = !y(f), b !== h)
              if (0 > a && x && !A && !n) c.insertBefore(h, d[n]), I = !0;
              else if (k(f) <= a || x && (!y(a) || 0 <= a)) c.insertBefore(h, d[n + 1] || null), I = !0;
          I || (c.insertBefore(h, d[A ? 3 : 0] || null), I = !0)
        }
        return I
      },
      _defaultSetter: function(a, k, d) {
        d.setAttribute(k, a)
      }
    });
    B.prototype.yGetter = B.prototype.xGetter;
    B.prototype.translateXSetter = B.prototype.translateYSetter =
      B.prototype.rotationSetter = B.prototype.verticalAlignSetter = B.prototype.rotationOriginXSetter = B.prototype.rotationOriginYSetter = B.prototype.scaleXSetter = B.prototype.scaleYSetter = B.prototype.matrixSetter = function(a, k) {
        this[k] = a;
        this.doTransform = !0
      };
    B.prototype["stroke-widthSetter"] = B.prototype.strokeSetter = function(a, k, d) {
      this[k] = a;
      this.stroke && this["stroke-width"] ? (B.prototype.fillSetter.call(this, this.stroke, "stroke", d), d.setAttribute("stroke-width", this["stroke-width"]), this.hasStroke = !0) : "stroke-width" ===
        k && 0 === a && this.hasStroke && (d.removeAttribute("stroke"), this.hasStroke = !1)
    };
    C = a.SVGRenderer = function() {
      this.init.apply(this, arguments)
    };
    n(C.prototype, {
      Element: B,
      SVG_NS: I,
      init: function(a, k, d, A, b, c) {
        var f;
        A = this.createElement("svg").attr({
          version: "1.1",
          "class": "highcharts-root"
        }).css(this.getStyle(A));
        f = A.element;
        a.appendChild(f);
        m(a, "dir", "ltr"); - 1 === a.innerHTML.indexOf("xmlns") && m(f, "xmlns", this.SVG_NS);
        this.isSVG = !0;
        this.box = f;
        this.boxWrapper = A;
        this.alignedObjects = [];
        this.url = (r || x) && e.getElementsByTagName("base").length ?
          N.location.href.replace(/#.*?$/, "").replace(/<[^>]*>/g, "").replace(/([\('\)])/g, "\\$1").replace(/ /g, "%20") : "";
        this.createElement("desc").add().element.appendChild(e.createTextNode("Created with Highstock 6.1.0"));
        this.defs = this.createElement("defs").add();
        this.allowHTML = c;
        this.forExport = b;
        this.gradients = {};
        this.cache = {};
        this.cacheKeys = [];
        this.imgCount = 0;
        this.setSize(k, d, !1);
        var h;
        r && a.getBoundingClientRect && (k = function() {
          z(a, {
            left: 0,
            top: 0
          });
          h = a.getBoundingClientRect();
          z(a, {
            left: Math.ceil(h.left) -
              h.left + "px",
            top: Math.ceil(h.top) - h.top + "px"
          })
        }, k(), this.unSubPixelFix = G(N, "resize", k))
      },
      getStyle: function(a) {
        return this.style = n({
          fontFamily: '"Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif',
          fontSize: "12px"
        }, a)
      },
      setStyle: function(a) {
        this.boxWrapper.css(this.getStyle(a))
      },
      isHidden: function() {
        return !this.boxWrapper.getBBox().width
      },
      destroy: function() {
        var a = this.defs;
        this.box = null;
        this.boxWrapper = this.boxWrapper.destroy();
        b(this.gradients || {});
        this.gradients = null;
        a && (this.defs = a.destroy());
        this.unSubPixelFix && this.unSubPixelFix();
        return this.alignedObjects = null
      },
      createElement: function(a) {
        var k = new this.Element;
        k.init(this, a);
        return k
      },
      draw: d,
      getRadialAttr: function(a, k) {
        return {
          cx: a[0] - a[2] / 2 + k.cx * a[2],
          cy: a[1] - a[2] / 2 + k.cy * a[2],
          r: k.r * a[2]
        }
      },
      getSpanWidth: function(a) {
        return a.getBBox(!0).width
      },
      applyEllipsis: function(a, k, d, A) {
        var b = a.rotation,
          c = d,
          f, h = 0,
          I = d.length,
          x = function(a) {
            k.removeChild(k.firstChild);
            a && k.appendChild(e.createTextNode(a))
          },
          n;
        a.rotation = 0;
        c = this.getSpanWidth(a, k);
        if (n =
          c > A) {
          for (; h <= I;) f = Math.ceil((h + I) / 2), c = d.substring(0, f) + "\u2026", x(c), c = this.getSpanWidth(a, k), h === I ? h = I + 1 : c > A ? I = f - 1 : h = f;
          0 === I && x("")
        }
        a.rotation = b;
        return n
      },
      escapes: {
        "\x26": "\x26amp;",
        "\x3c": "\x26lt;",
        "\x3e": "\x26gt;",
        "'": "\x26#39;",
        '"': "\x26quot;"
      },
      buildText: function(a) {
        var d = a.element,
          A = this,
          b = A.forExport,
          f = E(a.textStr, "").toString(),
          h = -1 !== f.indexOf("\x3c"),
          x = d.childNodes,
          n, r = m(d, "x"),
          q = a.styles,
          l = a.textWidth,
          D = q && q.lineHeight,
          F = q && q.textOutline,
          P = q && "ellipsis" === q.textOverflow,
          K = q && "nowrap" ===
          q.whiteSpace,
          M = q && q.fontSize,
          J, g, Q = x.length,
          q = l && !a.added && this.box,
          u = function(a) {
            var b;
            b = /(px|em)$/.test(a && a.style.fontSize) ? a.style.fontSize : M || A.style.fontSize || 12;
            return D ? k(D) : A.fontMetrics(b, a.getAttribute("style") ? a : d).h
          },
          y = function(a, k) {
            H(A.escapes, function(d, A) {
              k && -1 !== w(d, k) || (a = a.toString().replace(new RegExp(d, "g"), A))
            });
            return a
          },
          N = function(a, k) {
            var d;
            d = a.indexOf("\x3c");
            a = a.substring(d, a.indexOf("\x3e") - d);
            d = a.indexOf(k + "\x3d");
            if (-1 !== d && (d = d + k.length + 1, k = a.charAt(d), '"' === k || "'" ===
                k)) return a = a.substring(d + 1), a.substring(0, a.indexOf(k))
          };
        J = [f, P, K, D, F, M, l].join();
        if (J !== a.textCache) {
          for (a.textCache = J; Q--;) d.removeChild(x[Q]);
          h || F || P || l || -1 !== f.indexOf(" ") ? (q && q.appendChild(d), f = h ? f.replace(/<(b|strong)>/g, '\x3cspan style\x3d"font-weight:bold"\x3e').replace(/<(i|em)>/g, '\x3cspan style\x3d"font-style:italic"\x3e').replace(/<a/g, "\x3cspan").replace(/<\/(b|strong|i|em|a)>/g, "\x3c/span\x3e").split(/<br.*?>/g) : [f], f = c(f, function(a) {
            return "" !== a
          }), t(f, function(k, f) {
            var c, h = 0;
            k = k.replace(/^\s+|\s+$/g,
              "").replace(/<span/g, "|||\x3cspan").replace(/<\/span>/g, "\x3c/span\x3e|||");
            c = k.split("|||");
            t(c, function(k) {
              if ("" !== k || 1 === c.length) {
                var x = {},
                  q = e.createElementNS(A.SVG_NS, "tspan"),
                  w, E;
                (w = N(k, "class")) && m(q, "class", w);
                if (w = N(k, "style")) w = w.replace(/(;| |^)color([ :])/, "$1fill$2"), m(q, "style", w);
                (E = N(k, "href")) && !b && (m(q, "onclick", 'location.href\x3d"' + E + '"'), m(q, "class", "highcharts-anchor"), z(q, {
                  cursor: "pointer"
                }));
                k = y(k.replace(/<[a-zA-Z\/](.|\n)*?>/g, "") || " ");
                if (" " !== k) {
                  q.appendChild(e.createTextNode(k));
                  h ? x.dx = 0 : f && null !== r && (x.x = r);
                  m(q, x);
                  d.appendChild(q);
                  !h && g && (!R && b && z(q, {
                    display: "block"
                  }), m(q, "dy", u(q)));
                  if (l) {
                    x = k.replace(/([^\^])-/g, "$1- ").split(" ");
                    E = 1 < c.length || f || 1 < x.length && !K;
                    var H = [],
                      D, t = u(q),
                      F = a.rotation;
                    for (P && (n = A.applyEllipsis(a, q, k, l)); !P && E && (x.length || H.length);) a.rotation = 0, D = A.getSpanWidth(a, q), k = D > l, void 0 === n && (n = k), k && 1 !== x.length ? (q.removeChild(q.firstChild), H.unshift(x.pop())) : (x = H, H = [], x.length && !K && (q = e.createElementNS(I, "tspan"), m(q, {
                        dy: t,
                        x: r
                      }), w && m(q, "style", w), d.appendChild(q)),
                      D > l && (l = D)), x.length && q.appendChild(e.createTextNode(x.join(" ").replace(/- /g, "-")));
                    a.rotation = F
                  }
                  h++
                }
              }
            });
            g = g || d.childNodes.length
          }), n && a.attr("title", y(a.textStr, ["\x26lt;", "\x26gt;"])), q && q.removeChild(d), F && a.applyTextOutline && a.applyTextOutline(F)) : d.appendChild(e.createTextNode(y(f)))
        }
      },
      getContrast: function(a) {
        a = v(a).rgba;
        return 510 < a[0] + a[1] + a[2] ? "#000000" : "#FFFFFF"
      },
      button: function(a, k, d, A, b, f, c, h, x) {
        var I = this.label(a, k, d, x, null, null, null, null, "button"),
          q = 0;
        I.attr(K({
          padding: 8,
          r: 2
        }, b));
        var r,
          e, w, E;
        b = K({
          fill: "#f7f7f7",
          stroke: "#cccccc",
          "stroke-width": 1,
          style: {
            color: "#333333",
            cursor: "pointer",
            fontWeight: "normal"
          }
        }, b);
        r = b.style;
        delete b.style;
        f = K(b, {
          fill: "#e6e6e6"
        }, f);
        e = f.style;
        delete f.style;
        c = K(b, {
          fill: "#e6ebf5",
          style: {
            color: "#000000",
            fontWeight: "bold"
          }
        }, c);
        w = c.style;
        delete c.style;
        h = K(b, {
          style: {
            color: "#cccccc"
          }
        }, h);
        E = h.style;
        delete h.style;
        G(I.element, J ? "mouseover" : "mouseenter", function() {
          3 !== q && I.setState(1)
        });
        G(I.element, J ? "mouseout" : "mouseleave", function() {
          3 !== q && I.setState(q)
        });
        I.setState =
          function(a) {
            1 !== a && (I.state = q = a);
            I.removeClass(/highcharts-button-(normal|hover|pressed|disabled)/).addClass("highcharts-button-" + ["normal", "hover", "pressed", "disabled"][a || 0]);
            I.attr([b, f, c, h][a || 0]).css([r, e, w, E][a || 0])
          };
        I.attr(b).css(n({
          cursor: "default"
        }, r));
        return I.on("click", function(a) {
          3 !== q && A.call(I, a)
        })
      },
      crispLine: function(a, k) {
        a[1] === a[4] && (a[1] = a[4] = Math.round(a[1]) - k % 2 / 2);
        a[2] === a[5] && (a[2] = a[5] = Math.round(a[2]) + k % 2 / 2);
        return a
      },
      path: function(a) {
        var k = {
          fill: "none"
        };
        D(a) ? k.d = a : q(a) && n(k,
          a);
        return this.createElement("path").attr(k)
      },
      circle: function(a, k, d) {
        a = q(a) ? a : {
          x: a,
          y: k,
          r: d
        };
        k = this.createElement("circle");
        k.xSetter = k.ySetter = function(a, k, d) {
          d.setAttribute("c" + k, a)
        };
        return k.attr(a)
      },
      arc: function(a, k, d, A, b, f) {
        q(a) ? (A = a, k = A.y, d = A.r, a = A.x) : A = {
          innerR: A,
          start: b,
          end: f
        };
        a = this.symbol("arc", a, k, d, d, A);
        a.r = d;
        return a
      },
      rect: function(a, k, d, A, b, f) {
        b = q(a) ? a.r : b;
        var c = this.createElement("rect");
        a = q(a) ? a : void 0 === a ? {} : {
          x: a,
          y: k,
          width: Math.max(d, 0),
          height: Math.max(A, 0)
        };
        void 0 !== f && (a.strokeWidth =
          f, a = c.crisp(a));
        a.fill = "none";
        b && (a.r = b);
        c.rSetter = function(a, k, d) {
          m(d, {
            rx: a,
            ry: a
          })
        };
        return c.attr(a)
      },
      setSize: function(a, k, d) {
        var A = this.alignedObjects,
          b = A.length;
        this.width = a;
        this.height = k;
        for (this.boxWrapper.animate({
            width: a,
            height: k
          }, {
            step: function() {
              this.attr({
                viewBox: "0 0 " + this.attr("width") + " " + this.attr("height")
              })
            },
            duration: E(d, !0) ? void 0 : 0
          }); b--;) A[b].align()
      },
      g: function(a) {
        var k = this.createElement("g");
        return a ? k.attr({
          "class": "highcharts-" + a
        }) : k
      },
      image: function(a, k, d, A, b, f) {
        var c = {
            preserveAspectRatio: "none"
          },
          h, I = function(a, k) {
            a.setAttributeNS ? a.setAttributeNS("http://www.w3.org/1999/xlink", "href", k) : a.setAttribute("hc-svg-href", k)
          };
        1 < arguments.length && n(c, {
          x: k,
          y: d,
          width: A,
          height: b
        });
        h = this.createElement("image").attr(c);
        f ? (I(h.element, "data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw\x3d\x3d"), c = new N.Image, G(c, "load", function(k) {
          I(h.element, a);
          f.call(h, k)
        }), c.src = a) : I(h.element, a);
        return h
      },
      symbol: function(a, k, d, A, b, c) {
        var f = this,
          h, I = /^url\((.*?)\)$/,
          x = I.test(a),
          q = !x && (this.symbols[a] ?
            a : "circle"),
          r = q && this.symbols[q],
          w = y(k) && r && r.call(this.symbols, Math.round(k), Math.round(d), A, b, c),
          l, H;
        r ? (h = this.path(w), h.attr("fill", "none"), n(h, {
          symbolName: q,
          x: k,
          y: d,
          width: A,
          height: b
        }), c && n(h, c)) : x && (l = a.match(I)[1], h = this.image(l), h.imgwidth = E(Q[l] && Q[l].width, c && c.width), h.imgheight = E(Q[l] && Q[l].height, c && c.height), H = function() {
          h.attr({
            width: h.width,
            height: h.height
          })
        }, t(["width", "height"], function(a) {
          h[a + "Setter"] = function(a, k) {
            var d = {},
              A = this["img" + k],
              b = "width" === k ? "translateX" : "translateY";
            this[k] = a;
            y(A) && (this.element && this.element.setAttribute(k, A), this.alignByTranslate || (d[b] = ((this[k] || 0) - A) / 2, this.attr(d)))
          }
        }), y(k) && h.attr({
          x: k,
          y: d
        }), h.isImg = !0, y(h.imgwidth) && y(h.imgheight) ? H() : (h.attr({
          width: 0,
          height: 0
        }), u("img", {
          onload: function() {
            var a = g[f.chartIndex];
            0 === this.width && (z(this, {
              position: "absolute",
              top: "-999em"
            }), e.body.appendChild(this));
            Q[l] = {
              width: this.width,
              height: this.height
            };
            h.imgwidth = this.width;
            h.imgheight = this.height;
            h.element && H();
            this.parentNode && this.parentNode.removeChild(this);
            f.imgCount--;
            if (!f.imgCount && a && a.onload) a.onload()
          },
          src: l
        }), this.imgCount++));
        return h
      },
      symbols: {
        circle: function(a, k, d, A) {
          return this.arc(a + d / 2, k + A / 2, d / 2, A / 2, {
            start: 0,
            end: 2 * Math.PI,
            open: !1
          })
        },
        square: function(a, k, d, A) {
          return ["M", a, k, "L", a + d, k, a + d, k + A, a, k + A, "Z"]
        },
        triangle: function(a, k, d, A) {
          return ["M", a + d / 2, k, "L", a + d, k + A, a, k + A, "Z"]
        },
        "triangle-down": function(a, k, d, A) {
          return ["M", a, k, "L", a + d, k, a + d / 2, k + A, "Z"]
        },
        diamond: function(a, k, d, A) {
          return ["M", a + d / 2, k, "L", a + d, k + A / 2, a + d / 2, k + A, a, k + A / 2, "Z"]
        },
        arc: function(a,
          k, d, A, b) {
          var c = b.start,
            f = b.r || d,
            h = b.r || A || d,
            I = b.end - .001;
          d = b.innerR;
          A = E(b.open, .001 > Math.abs(b.end - b.start - 2 * Math.PI));
          var x = Math.cos(c),
            n = Math.sin(c),
            q = Math.cos(I),
            I = Math.sin(I);
          b = .001 > b.end - c - Math.PI ? 0 : 1;
          f = ["M", a + f * x, k + h * n, "A", f, h, 0, b, 1, a + f * q, k + h * I];
          y(d) && f.push(A ? "M" : "L", a + d * q, k + d * I, "A", d, d, 0, b, 0, a + d * x, k + d * n);
          f.push(A ? "" : "Z");
          return f
        },
        callout: function(a, k, d, A, b) {
          var c = Math.min(b && b.r || 0, d, A),
            f = c + 6,
            h = b && b.anchorX;
          b = b && b.anchorY;
          var I;
          I = ["M", a + c, k, "L", a + d - c, k, "C", a + d, k, a + d, k, a + d, k + c, "L", a + d, k + A -
            c, "C", a + d, k + A, a + d, k + A, a + d - c, k + A, "L", a + c, k + A, "C", a, k + A, a, k + A, a, k + A - c, "L", a, k + c, "C", a, k, a, k, a + c, k
          ];
          h && h > d ? b > k + f && b < k + A - f ? I.splice(13, 3, "L", a + d, b - 6, a + d + 6, b, a + d, b + 6, a + d, k + A - c) : I.splice(13, 3, "L", a + d, A / 2, h, b, a + d, A / 2, a + d, k + A - c) : h && 0 > h ? b > k + f && b < k + A - f ? I.splice(33, 3, "L", a, b + 6, a - 6, b, a, b - 6, a, k + c) : I.splice(33, 3, "L", a, A / 2, h, b, a, A / 2, a, k + c) : b && b > A && h > a + f && h < a + d - f ? I.splice(23, 3, "L", h + 6, k + A, h, k + A + 6, h - 6, k + A, a + c, k + A) : b && 0 > b && h > a + f && h < a + d - f && I.splice(3, 3, "L", h - 6, k, h, k - 6, h + 6, k, d - c, k);
          return I
        }
      },
      clipRect: function(k, d, A,
        b) {
        var c = a.uniqueKey(),
          f = this.createElement("clipPath").attr({
            id: c
          }).add(this.defs);
        k = this.rect(k, d, A, b, 0).add(f);
        k.id = c;
        k.clipPath = f;
        k.count = 0;
        return k
      },
      text: function(a, k, d, A) {
        var b = {};
        if (A && (this.allowHTML || !this.forExport)) return this.html(a, k, d);
        b.x = Math.round(k || 0);
        d && (b.y = Math.round(d));
        if (a || 0 === a) b.text = a;
        a = this.createElement("text").attr(b);
        A || (a.xSetter = function(a, k, d) {
          var A = d.getElementsByTagName("tspan"),
            b, c = d.getAttribute(k),
            f;
          for (f = 0; f < A.length; f++) b = A[f], b.getAttribute(k) === c && b.setAttribute(k,
            a);
          d.setAttribute(k, a)
        });
        return a
      },
      fontMetrics: function(a, d) {
        a = a || d && d.style && d.style.fontSize || this.style && this.style.fontSize;
        a = /px/.test(a) ? k(a) : /em/.test(a) ? parseFloat(a) * (d ? this.fontMetrics(null, d.parentNode).f : 16) : 12;
        d = 24 > a ? a + 3 : Math.round(1.2 * a);
        return {
          h: d,
          b: Math.round(.8 * d),
          f: a
        }
      },
      rotCorr: function(a, k, d) {
        var A = a;
        k && d && (A = Math.max(A * Math.cos(k * l), 4));
        return {
          x: -a / 3 * Math.sin(k * l),
          y: A
        }
      },
      label: function(k, d, b, c, f, h, I, x, q) {
        var r = this,
          e = r.g("button" !== q && "label"),
          w = e.text = r.text("", 0, 0, I).attr({
            zIndex: 1
          }),
          E, l, H = 0,
          D = 3,
          F = 0,
          R, P, J, g, Q, m = {},
          u, N, v = /^url\((.*?)\)$/.test(c),
          z = v,
          M, p, S, O;
        q && e.addClass("highcharts-" + q);
        z = v;
        M = function() {
          return (u || 0) % 2 / 2
        };
        p = function() {
          var a = w.element.style,
            k = {};
          l = (void 0 === R || void 0 === P || Q) && y(w.textStr) && w.getBBox();
          e.width = (R || l.width || 0) + 2 * D + F;
          e.height = (P || l.height || 0) + 2 * D;
          N = D + r.fontMetrics(a && a.fontSize, w).b;
          z && (E || (e.box = E = r.symbols[c] || v ? r.symbol(c) : r.rect(), E.addClass(("button" === q ? "" : "highcharts-label-box") + (q ? " highcharts-" + q + "-box" : "")), E.add(e), a = M(), k.x = a, k.y = (x ? -N :
            0) + a), k.width = Math.round(e.width), k.height = Math.round(e.height), E.attr(n(k, m)), m = {})
        };
        S = function() {
          var a = F + D,
            k;
          k = x ? 0 : N;
          y(R) && l && ("center" === Q || "right" === Q) && (a += {
            center: .5,
            right: 1
          }[Q] * (R - l.width));
          if (a !== w.x || k !== w.y) w.attr("x", a), void 0 !== k && w.attr("y", k);
          w.x = a;
          w.y = k
        };
        O = function(a, k) {
          E ? E.attr(a, k) : m[a] = k
        };
        e.onAdd = function() {
          w.add(e);
          e.attr({
            text: k || 0 === k ? k : "",
            x: d,
            y: b
          });
          E && y(f) && e.attr({
            anchorX: f,
            anchorY: h
          })
        };
        e.widthSetter = function(k) {
          R = a.isNumber(k) ? k : null
        };
        e.heightSetter = function(a) {
          P = a
        };
        e["text-alignSetter"] =
          function(a) {
            Q = a
          };
        e.paddingSetter = function(a) {
          y(a) && a !== D && (D = e.padding = a, S())
        };
        e.paddingLeftSetter = function(a) {
          y(a) && a !== F && (F = a, S())
        };
        e.alignSetter = function(a) {
          a = {
            left: 0,
            center: .5,
            right: 1
          }[a];
          a !== H && (H = a, l && e.attr({
            x: J
          }))
        };
        e.textSetter = function(a) {
          void 0 !== a && w.textSetter(a);
          p();
          S()
        };
        e["stroke-widthSetter"] = function(a, k) {
          a && (z = !0);
          u = this["stroke-width"] = a;
          O(k, a)
        };
        e.strokeSetter = e.fillSetter = e.rSetter = function(a, k) {
          "r" !== k && ("fill" === k && a && (z = !0), e[k] = a);
          O(k, a)
        };
        e.anchorXSetter = function(a, k) {
          f = e.anchorX =
            a;
          O(k, Math.round(a) - M() - J)
        };
        e.anchorYSetter = function(a, k) {
          h = e.anchorY = a;
          O(k, a - g)
        };
        e.xSetter = function(a) {
          e.x = a;
          H && (a -= H * ((R || l.width) + 2 * D), e["forceAnimate:x"] = !0);
          J = Math.round(a);
          e.attr("translateX", J)
        };
        e.ySetter = function(a) {
          g = e.y = Math.round(a);
          e.attr("translateY", g)
        };
        var ea = e.css;
        return n(e, {
          css: function(a) {
            if (a) {
              var k = {};
              a = K(a);
              t(e.textProps, function(d) {
                void 0 !== a[d] && (k[d] = a[d], delete a[d])
              });
              w.css(k);
              "width" in k && p()
            }
            return ea.call(e, a)
          },
          getBBox: function() {
            return {
              width: l.width + 2 * D,
              height: l.height +
                2 * D,
              x: l.x - D,
              y: l.y - D
            }
          },
          shadow: function(a) {
            a && (p(), E && E.shadow(a));
            return e
          },
          destroy: function() {
            A(e.element, "mouseenter");
            A(e.element, "mouseleave");
            w && (w = w.destroy());
            E && (E = E.destroy());
            B.prototype.destroy.call(e);
            e = r = p = S = O = null
          }
        })
      }
    });
    a.Renderer = C
  })(L);
  (function(a) {
    var B = a.attr,
      C = a.createElement,
      G = a.css,
      p = a.defined,
      m = a.each,
      g = a.extend,
      v = a.isFirefox,
      z = a.isMS,
      u = a.isWebKit,
      y = a.pick,
      l = a.pInt,
      b = a.SVGRenderer,
      e = a.win,
      t = a.wrap;
    g(a.SVGElement.prototype, {
      htmlCss: function(a) {
        var b = this.element;
        if (b = a && "SPAN" ===
          b.tagName && a.width) delete a.width, this.textWidth = b, this.htmlUpdateTransform();
        a && "ellipsis" === a.textOverflow && (a.whiteSpace = "nowrap", a.overflow = "hidden");
        this.styles = g(this.styles, a);
        G(this.element, a);
        return this
      },
      htmlGetBBox: function() {
        var a = this.element;
        return {
          x: a.offsetLeft,
          y: a.offsetTop,
          width: a.offsetWidth,
          height: a.offsetHeight
        }
      },
      htmlUpdateTransform: function() {
        if (this.added) {
          var a = this.renderer,
            b = this.element,
            c = this.translateX || 0,
            h = this.translateY || 0,
            e = this.x || 0,
            D = this.y || 0,
            r = this.textAlign ||
            "left",
            t = {
              left: 0,
              center: .5,
              right: 1
            }[r],
            q = this.styles,
            F = q && q.whiteSpace;
          G(b, {
            marginLeft: c,
            marginTop: h
          });
          this.shadows && m(this.shadows, function(a) {
            G(a, {
              marginLeft: c + 1,
              marginTop: h + 1
            })
          });
          this.inverted && m(b.childNodes, function(d) {
            a.invertChild(d, b)
          });
          if ("SPAN" === b.tagName) {
            var q = this.rotation,
              x = this.textWidth && l(this.textWidth),
              K = [q, r, b.innerHTML, this.textWidth, this.textAlign].join(),
              d;
            (d = x !== this.oldTextWidth) && !(d = x > this.oldTextWidth) && ((d = this.textPxLength) || (G(b, {
                width: "",
                whiteSpace: F || "nowrap"
              }), d =
              b.offsetWidth), d = d > x);
            d && /[ \-]/.test(b.textContent || b.innerText) && (G(b, {
              width: x + "px",
              display: "block",
              whiteSpace: F || "normal"
            }), this.oldTextWidth = x);
            K !== this.cTT && (F = a.fontMetrics(b.style.fontSize).b, p(q) && q !== (this.oldRotation || 0) && this.setSpanRotation(q, t, F), this.getSpanCorrection(!p(q) && this.textPxLength || b.offsetWidth, F, t, q, r));
            G(b, {
              left: e + (this.xCorr || 0) + "px",
              top: D + (this.yCorr || 0) + "px"
            });
            this.cTT = K;
            this.oldRotation = q
          }
        } else this.alignOnAdd = !0
      },
      setSpanRotation: function(a, b, c) {
        var f = {},
          e = this.renderer.getTransformKey();
        f[e] = f.transform = "rotate(" + a + "deg)";
        f[e + (v ? "Origin" : "-origin")] = f.transformOrigin = 100 * b + "% " + c + "px";
        G(this.element, f)
      },
      getSpanCorrection: function(a, b, c) {
        this.xCorr = -a * c;
        this.yCorr = -b
      }
    });
    g(b.prototype, {
      getTransformKey: function() {
        return z && !/Edge/.test(e.navigator.userAgent) ? "-ms-transform" : u ? "-webkit-transform" : v ? "MozTransform" : e.opera ? "-o-transform" : ""
      },
      html: function(a, b, c) {
        var f = this.createElement("span"),
          e = f.element,
          n = f.renderer,
          r = n.isSVG,
          l = function(a, b) {
            m(["opacity", "visibility"], function(c) {
              t(a,
                c + "Setter",
                function(a, d, c, f) {
                  a.call(this, d, c, f);
                  b[c] = d
                })
            });
            a.addedSetters = !0
          };
        f.textSetter = function(a) {
          a !== e.innerHTML && delete this.bBox;
          this.textStr = a;
          e.innerHTML = y(a, "");
          f.doTransform = !0
        };
        r && l(f, f.element.style);
        f.xSetter = f.ySetter = f.alignSetter = f.rotationSetter = function(a, b) {
          "align" === b && (b = "textAlign");
          f[b] = a;
          f.doTransform = !0
        };
        f.afterSetters = function() {
          this.doTransform && (this.htmlUpdateTransform(), this.doTransform = !1)
        };
        f.attr({
          text: a,
          x: Math.round(b),
          y: Math.round(c)
        }).css({
          fontFamily: this.style.fontFamily,
          fontSize: this.style.fontSize,
          position: "absolute"
        });
        e.style.whiteSpace = "nowrap";
        f.css = f.htmlCss;
        r && (f.add = function(a) {
          var b, c = n.box.parentNode,
            h = [];
          if (this.parentGroup = a) {
            if (b = a.div, !b) {
              for (; a;) h.push(a), a = a.parentGroup;
              m(h.reverse(), function(a) {
                function d(k, d) {
                  a[d] = k;
                  "translateX" === d ? x.left = k + "px" : x.top = k + "px";
                  a.doTransform = !0
                }
                var x, k = B(a.element, "class");
                k && (k = {
                  className: k
                });
                b = a.div = a.div || C("div", k, {
                  position: "absolute",
                  left: (a.translateX || 0) + "px",
                  top: (a.translateY || 0) + "px",
                  display: a.display,
                  opacity: a.opacity,
                  pointerEvents: a.styles && a.styles.pointerEvents
                }, b || c);
                x = b.style;
                g(a, {
                  classSetter: function(a) {
                    return function(k) {
                      this.element.setAttribute("class", k);
                      a.className = k
                    }
                  }(b),
                  on: function() {
                    h[0].div && f.on.apply({
                      element: h[0].div
                    }, arguments);
                    return a
                  },
                  translateXSetter: d,
                  translateYSetter: d
                });
                a.addedSetters || l(a, x)
              })
            }
          } else b = c;
          b.appendChild(e);
          f.added = !0;
          f.alignOnAdd && f.htmlUpdateTransform();
          return f
        });
        return f
      }
    })
  })(L);
  (function(a) {
    var B = a.defined,
      C = a.each,
      G = a.extend,
      p = a.merge,
      m = a.pick,
      g = a.timeUnits,
      v = a.win;
    a.Time = function(a) {
      this.update(a, !1)
    };
    a.Time.prototype = {
      defaultOptions: {},
      update: function(g) {
        var u = m(g && g.useUTC, !0),
          y = this;
        this.options = g = p(!0, this.options || {}, g);
        this.Date = g.Date || v.Date;
        this.timezoneOffset = (this.useUTC = u) && g.timezoneOffset;
        this.getTimezoneOffset = this.timezoneOffsetFunction();
        (this.variableTimezone = !(u && !g.getTimezoneOffset && !g.timezone)) || this.timezoneOffset ? (this.get = function(a, b) {
            var e = b.getTime(),
              l = e - y.getTimezoneOffset(b);
            b.setTime(l);
            a = b["getUTC" + a]();
            b.setTime(e);
            return a
          },
          this.set = function(l, b, e) {
            var t;
            if (-1 !== a.inArray(l, ["Milliseconds", "Seconds", "Minutes"])) b["set" + l](e);
            else t = y.getTimezoneOffset(b), t = b.getTime() - t, b.setTime(t), b["setUTC" + l](e), l = y.getTimezoneOffset(b), t = b.getTime() + l, b.setTime(t)
          }) : u ? (this.get = function(a, b) {
          return b["getUTC" + a]()
        }, this.set = function(a, b, e) {
          return b["setUTC" + a](e)
        }) : (this.get = function(a, b) {
          return b["get" + a]()
        }, this.set = function(a, b, e) {
          return b["set" + a](e)
        })
      },
      makeTime: function(g, u, y, l, b, e) {
        var t, n, f;
        this.useUTC ? (t = this.Date.UTC.apply(0,
          arguments), n = this.getTimezoneOffset(t), t += n, f = this.getTimezoneOffset(t), n !== f ? t += f - n : n - 36E5 !== this.getTimezoneOffset(t - 36E5) || a.isSafari || (t -= 36E5)) : t = (new this.Date(g, u, m(y, 1), m(l, 0), m(b, 0), m(e, 0))).getTime();
        return t
      },
      timezoneOffsetFunction: function() {
        var g = this,
          m = this.options,
          y = v.moment;
        if (!this.useUTC) return function(a) {
          return 6E4 * (new Date(a)).getTimezoneOffset()
        };
        if (m.timezone) {
          if (y) return function(a) {
            return 6E4 * -y.tz(a, m.timezone).utcOffset()
          };
          a.error(25)
        }
        return this.useUTC && m.getTimezoneOffset ?
          function(a) {
            return 6E4 * m.getTimezoneOffset(a)
          } : function() {
            return 6E4 * (g.timezoneOffset || 0)
          }
      },
      dateFormat: function(g, m, y) {
        if (!a.defined(m) || isNaN(m)) return a.defaultOptions.lang.invalidDate || "";
        g = a.pick(g, "%Y-%m-%d %H:%M:%S");
        var l = this,
          b = new this.Date(m),
          e = this.get("Hours", b),
          t = this.get("Day", b),
          n = this.get("Date", b),
          f = this.get("Month", b),
          c = this.get("FullYear", b),
          h = a.defaultOptions.lang,
          w = h.weekdays,
          D = h.shortWeekdays,
          r = a.pad,
          b = a.extend({
            a: D ? D[t] : w[t].substr(0, 3),
            A: w[t],
            d: r(n),
            e: r(n, 2, " "),
            w: t,
            b: h.shortMonths[f],
            B: h.months[f],
            m: r(f + 1),
            y: c.toString().substr(2, 2),
            Y: c,
            H: r(e),
            k: e,
            I: r(e % 12 || 12),
            l: e % 12 || 12,
            M: r(l.get("Minutes", b)),
            p: 12 > e ? "AM" : "PM",
            P: 12 > e ? "am" : "pm",
            S: r(b.getSeconds()),
            L: r(Math.round(m % 1E3), 3)
          }, a.dateFormats);
        a.objectEach(b, function(a, b) {
          for (; - 1 !== g.indexOf("%" + b);) g = g.replace("%" + b, "function" === typeof a ? a.call(l, m) : a)
        });
        return y ? g.substr(0, 1).toUpperCase() + g.substr(1) : g
      },
      getTimeTicks: function(a, u, y, l) {
        var b = this,
          e = [],
          t = {},
          n, f = new b.Date(u),
          c = a.unitRange,
          h = a.count || 1,
          w;
        if (B(u)) {
          b.set("Milliseconds",
            f, c >= g.second ? 0 : h * Math.floor(b.get("Milliseconds", f) / h));
          c >= g.second && b.set("Seconds", f, c >= g.minute ? 0 : h * Math.floor(b.get("Seconds", f) / h));
          c >= g.minute && b.set("Minutes", f, c >= g.hour ? 0 : h * Math.floor(b.get("Minutes", f) / h));
          c >= g.hour && b.set("Hours", f, c >= g.day ? 0 : h * Math.floor(b.get("Hours", f) / h));
          c >= g.day && b.set("Date", f, c >= g.month ? 1 : h * Math.floor(b.get("Date", f) / h));
          c >= g.month && (b.set("Month", f, c >= g.year ? 0 : h * Math.floor(b.get("Month", f) / h)), n = b.get("FullYear", f));
          c >= g.year && b.set("FullYear", f, n - n % h);
          c === g.week &&
            b.set("Date", f, b.get("Date", f) - b.get("Day", f) + m(l, 1));
          n = b.get("FullYear", f);
          l = b.get("Month", f);
          var D = b.get("Date", f),
            r = b.get("Hours", f);
          u = f.getTime();
          b.variableTimezone && (w = y - u > 4 * g.month || b.getTimezoneOffset(u) !== b.getTimezoneOffset(y));
          f = f.getTime();
          for (u = 1; f < y;) e.push(f), f = c === g.year ? b.makeTime(n + u * h, 0) : c === g.month ? b.makeTime(n, l + u * h) : !w || c !== g.day && c !== g.week ? w && c === g.hour && 1 < h ? b.makeTime(n, l, D, r + u * h) : f + c * h : b.makeTime(n, l, D + u * h * (c === g.day ? 1 : 7)), u++;
          e.push(f);
          c <= g.hour && 1E4 > e.length && C(e, function(a) {
            0 ===
              a % 18E5 && "000000000" === b.dateFormat("%H%M%S%L", a) && (t[a] = "day")
          })
        }
        e.info = G(a, {
          higherRanks: t,
          totalRange: c * h
        });
        return e
      }
    }
  })(L);
  (function(a) {
    var B = a.color,
      C = a.merge;
    a.defaultOptions = {
      colors: "#7cb5ec #434348 #90ed7d #f7a35c #8085e9 #f15c80 #e4d354 #2b908f #f45b5b #91e8e1".split(" "),
      symbols: ["circle", "diamond", "square", "triangle", "triangle-down"],
      lang: {
        loading: "Loading...",
        months: "January February March April May June July August September October November December".split(" "),
        shortMonths: "Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec".split(" "),
        weekdays: "Sunday Monday Tuesday Wednesday Thursday Friday Saturday".split(" "),
        decimalPoint: ".",
        numericSymbols: "kMGTPE".split(""),
        resetZoom: "Reset zoom",
        resetZoomTitle: "Reset zoom level 1:1",
        thousandsSep: " "
      },
      global: {},
      time: a.Time.prototype.defaultOptions,
      chart: {
        borderRadius: 0,
        defaultSeriesType: "line",
        ignoreHiddenSeries: !0,
        spacing: [10, 10, 15, 10],
        resetZoomButton: {
          theme: {
            zIndex: 6
          },
          position: {
            align: "right",
            x: -10,
            y: 10
          }
        },
        width: null,
        height: null,
        borderColor: "#335cad",
        backgroundColor: "#ffffff",
        plotBorderColor: "#cccccc"
      },
      title: {
        text: "Chart title",
        align: "center",
        margin: 15,
        widthAdjust: -44
      },
      subtitle: {
        text: "",
        align: "center",
        widthAdjust: -44
      },
      plotOptions: {},
      labels: {
        style: {
          position: "absolute",
          color: "#333333"
        }
      },
      legend: {
        enabled: !0,
        align: "center",
        alignColumns: !0,
        layout: "horizontal",
        labelFormatter: function() {
          return this.name
        },
        borderColor: "#999999",
        borderRadius: 0,
        navigation: {
          activeColor: "#003399",
          inactiveColor: "#cccccc"
        },
        itemStyle: {
          color: "#333333",
          fontSize: "12px",
          fontWeight: "bold",
          textOverflow: "ellipsis"
        },
        itemHoverStyle: {
          color: "#000000"
        },
        itemHiddenStyle: {
          color: "#cccccc"
        },
        shadow: !1,
        itemCheckboxStyle: {
          position: "absolute",
          width: "13px",
          height: "13px"
        },
        squareSymbol: !0,
        symbolPadding: 5,
        verticalAlign: "bottom",
        x: 0,
        y: 0,
        title: {
          style: {
            fontWeight: "bold"
          }
        }
      },
      loading: {
        labelStyle: {
          fontWeight: "bold",
          position: "relative",
          top: "45%"
        },
        style: {
          position: "absolute",
          backgroundColor: "#ffffff",
          opacity: .5,
          textAlign: "center"
        }
      },
      tooltip: {
        enabled: !0,
        animation: a.svg,
        borderRadius: 3,
        dateTimeLabelFormats: {
          millisecond: "%A, %b %e, %H:%M:%S.%L",
          second: "%A, %b %e, %H:%M:%S",
          minute: "%A, %b %e, %H:%M",
          hour: "%A, %b %e, %H:%M",
          day: "%A, %b %e, %Y",
          // week: "Week from %A, %b %e, %Y",
          week: "Semana de %A, %b %e, %Y",
          month: "%B %Y",
          year: "%Y"
        },
        footerFormat: "",
        padding: 8,
        snap: a.isTouchDevice ? 25 : 10,
        backgroundColor: B("#f7f7f7").setOpacity(.85).get(),
        borderWidth: 1,
        headerFormat: '\x3cspan style\x3d"font-size: 10px"\x3e{point.key}\x3c/span\x3e\x3cbr/\x3e',
        pointFormat: '\x3cspan style\x3d"color:{point.color}"\x3e\u25cf\x3c/span\x3e {series.name}: \x3cb\x3e{point.y}\x3c/b\x3e\x3cbr/\x3e',
        shadow: !0,
        style: {
          color: "#333333",
          cursor: "default",
          fontSize: "12px",
          pointerEvents: "none",
          whiteSpace: "nowrap"
        }
      },
      // credits: {
      //   enabled: !0,
      //   href: "http://www.highcharts.com",
      //   position: {
      //     align: "right",
      //     x: -10,
      //     verticalAlign: "bottom",
      //     y: -5
      //   },
      //   style: {
      //     cursor: "pointer",
      //     color: "#999999",
      //     fontSize: "9px"
      //   },
      //   text: "Highcharts.com"
      // }
    };
    a.setOptions = function(B) {
      a.defaultOptions = C(!0, a.defaultOptions, B);
      a.time.update(C(a.defaultOptions.global, a.defaultOptions.time), !1);
      return a.defaultOptions
    };
    a.getOptions = function() {
      return a.defaultOptions
    };
    a.defaultPlotOptions = a.defaultOptions.plotOptions;
    a.time = new a.Time(C(a.defaultOptions.global, a.defaultOptions.time));
    a.dateFormat = function(C, p, m) {
      return a.time.dateFormat(C, p, m)
    }
  })(L);
  (function(a) {
    var B = a.correctFloat,
      C = a.defined,
      G = a.destroyObjectProperties,
      p = a.fireEvent,
      m = a.isNumber,
      g = a.merge,
      v = a.pick,
      z = a.deg2rad;
    a.Tick = function(a, g, l, b) {
      this.axis = a;
      this.pos = g;
      this.type = l || "";
      this.isNewLabel = this.isNew = !0;
      l || b || this.addLabel()
    };
    a.Tick.prototype = {
      addLabel: function() {
        var a = this.axis,
          m = a.options,
          l = a.chart,
          b = a.categories,
          e = a.names,
          t = this.pos,
          n = m.labels,
          f = a.tickPositions,
          c = t === f[0],
          h = t === f[f.length - 1],
          e = b ? v(b[t], e[t], t) : t,
          b = this.label,
          f = f.info,
          w;
        a.isDatetimeAxis && f && (w = m.dateTimeLabelFormats[f.higherRanks[t] || f.unitName]);
        this.isFirst = c;
        this.isLast = h;
        m = a.labelFormatter.call({
          axis: a,
          chart: l,
          isFirst: c,
          isLast: h,
          dateTimeLabelFormat: w,
          value: a.isLog ? B(a.lin2log(e)) : e,
          pos: t
        });
        if (C(b)) b && b.attr({
          text: m
        });
        else {
          if (this.label = b = C(m) && n.enabled ? l.renderer.text(m, 0, 0, n.useHTML).css(g(n.style)).add(a.labelGroup) : null) b.textPxLength = b.getBBox().width;
          this.rotation =
            0
        }
      },
      getLabelSize: function() {
        return this.label ? this.label.getBBox()[this.axis.horiz ? "height" : "width"] : 0
      },
      handleOverflow: function(a) {
        var g = this.axis,
          l = g.options.labels,
          b = a.x,
          e = g.chart.chartWidth,
          t = g.chart.spacing,
          n = v(g.labelLeft, Math.min(g.pos, t[3])),
          t = v(g.labelRight, Math.max(g.isRadial ? 0 : g.pos + g.len, e - t[1])),
          f = this.label,
          c = this.rotation,
          h = {
            left: 0,
            center: .5,
            right: 1
          }[g.labelAlign || f.attr("align")],
          w = f.getBBox().width,
          D = g.getSlotWidth(),
          r = D,
          J = 1,
          q, F = {};
        if (c || !1 === l.overflow) 0 > c && b - h * w < n ? q = Math.round(b /
          Math.cos(c * z) - n) : 0 < c && b + h * w > t && (q = Math.round((e - b) / Math.cos(c * z)));
        else if (e = b + (1 - h) * w, b - h * w < n ? r = a.x + r * (1 - h) - n : e > t && (r = t - a.x + r * h, J = -1), r = Math.min(D, r), r < D && "center" === g.labelAlign && (a.x += J * (D - r - h * (D - Math.min(w, r)))), w > r || g.autoRotation && (f.styles || {}).width) q = r;
        q && (F.width = q, (l.style || {}).textOverflow || (F.textOverflow = "ellipsis"), f.css(F))
      },
      getPosition: function(g, m, l, b) {
        var e = this.axis,
          t = e.chart,
          n = b && t.oldChartHeight || t.chartHeight;
        g = {
          x: g ? a.correctFloat(e.translate(m + l, null, null, b) + e.transB) : e.left +
            e.offset + (e.opposite ? (b && t.oldChartWidth || t.chartWidth) - e.right - e.left : 0),
          y: g ? n - e.bottom + e.offset - (e.opposite ? e.height : 0) : a.correctFloat(n - e.translate(m + l, null, null, b) - e.transB)
        };
        p(this, "afterGetPosition", {
          pos: g
        });
        return g
      },
      getLabelPosition: function(a, g, l, b, e, t, n, f) {
        var c = this.axis,
          h = c.transA,
          w = c.reversed,
          D = c.staggerLines,
          r = c.tickRotCorr || {
            x: 0,
            y: 0
          },
          J = e.y,
          q = b || c.reserveSpaceDefault ? 0 : -c.labelOffset * ("center" === c.labelAlign ? .5 : 1),
          F = {};
        C(J) || (J = 0 === c.side ? l.rotation ? -8 : -l.getBBox().height : 2 === c.side ?
          r.y + 8 : Math.cos(l.rotation * z) * (r.y - l.getBBox(!1, 0).height / 2));
        a = a + e.x + q + r.x - (t && b ? t * h * (w ? -1 : 1) : 0);
        g = g + J - (t && !b ? t * h * (w ? 1 : -1) : 0);
        D && (l = n / (f || 1) % D, c.opposite && (l = D - l - 1), g += c.labelOffset / D * l);
        F.x = a;
        F.y = Math.round(g);
        p(this, "afterGetLabelPosition", {
          pos: F
        });
        return F
      },
      getMarkPath: function(a, g, l, b, e, t) {
        return t.crispLine(["M", a, g, "L", a + (e ? 0 : -l), g + (e ? l : 0)], b)
      },
      renderGridLine: function(a, g, l) {
        var b = this.axis,
          e = b.options,
          t = this.gridLine,
          n = {},
          f = this.pos,
          c = this.type,
          h = b.tickmarkOffset,
          w = b.chart.renderer,
          D = c ? c + "Grid" :
          "grid",
          r = e[D + "LineWidth"],
          J = e[D + "LineColor"],
          e = e[D + "LineDashStyle"];
        t || (n.stroke = J, n["stroke-width"] = r, e && (n.dashstyle = e), c || (n.zIndex = 1), a && (n.opacity = 0), this.gridLine = t = w.path().attr(n).addClass("highcharts-" + (c ? c + "-" : "") + "grid-line").add(b.gridGroup));
        if (!a && t && (a = b.getPlotLinePath(f + h, t.strokeWidth() * l, a, !0))) t[this.isNew ? "attr" : "animate"]({
          d: a,
          opacity: g
        })
      },
      renderMark: function(a, g, l) {
        var b = this.axis,
          e = b.options,
          t = b.chart.renderer,
          n = this.type,
          f = n ? n + "Tick" : "tick",
          c = b.tickSize(f),
          h = this.mark,
          w = !h,
          D = a.x;
        a = a.y;
        var r = v(e[f + "Width"], !n && b.isXAxis ? 1 : 0),
          e = e[f + "Color"];
        c && (b.opposite && (c[0] = -c[0]), w && (this.mark = h = t.path().addClass("highcharts-" + (n ? n + "-" : "") + "tick").add(b.axisGroup), h.attr({
          stroke: e,
          "stroke-width": r
        })), h[w ? "attr" : "animate"]({
          d: this.getMarkPath(D, a, c[0], h.strokeWidth() * l, b.horiz, t),
          opacity: g
        }))
      },
      renderLabel: function(a, g, l, b) {
        var e = this.axis,
          t = e.horiz,
          n = e.options,
          f = this.label,
          c = n.labels,
          h = c.step,
          e = e.tickmarkOffset,
          w = !0,
          D = a.x;
        a = a.y;
        f && m(D) && (f.xy = a = this.getLabelPosition(D, a, f, t, c, e,
          b, h), this.isFirst && !this.isLast && !v(n.showFirstLabel, 1) || this.isLast && !this.isFirst && !v(n.showLastLabel, 1) ? w = !1 : !t || c.step || c.rotation || g || 0 === l || this.handleOverflow(a), h && b % h && (w = !1), w && m(a.y) ? (a.opacity = l, f[this.isNewLabel ? "attr" : "animate"](a), this.isNewLabel = !1) : (f.attr("y", -9999), this.isNewLabel = !0))
      },
      render: function(g, m, l) {
        var b = this.axis,
          e = b.horiz,
          t = this.getPosition(e, this.pos, b.tickmarkOffset, m),
          n = t.x,
          f = t.y,
          b = e && n === b.pos + b.len || !e && f === b.pos ? -1 : 1;
        l = v(l, 1);
        this.isActive = !0;
        this.renderGridLine(m,
          l, b);
        this.renderMark(t, l, b);
        this.renderLabel(t, m, l, g);
        this.isNew = !1;
        a.fireEvent(this, "afterRender")
      },
      destroy: function() {
        G(this, this.axis)
      }
    }
  })(L);
  var da = function(a) {
    var B = a.addEvent,
      C = a.animObject,
      G = a.arrayMax,
      p = a.arrayMin,
      m = a.color,
      g = a.correctFloat,
      v = a.defaultOptions,
      z = a.defined,
      u = a.deg2rad,
      y = a.destroyObjectProperties,
      l = a.each,
      b = a.extend,
      e = a.fireEvent,
      t = a.format,
      n = a.getMagnitude,
      f = a.grep,
      c = a.inArray,
      h = a.isArray,
      w = a.isNumber,
      D = a.isString,
      r = a.merge,
      J = a.normalizeTickInterval,
      q = a.objectEach,
      F = a.pick,
      x = a.removeEvent,
      K = a.splat,
      d = a.syncTimeout,
      H = a.Tick,
      E = function() {
        this.init.apply(this, arguments)
      };
    a.extend(E.prototype, {
      defaultOptions: {
        dateTimeLabelFormats: {
          millisecond: "%H:%M:%S.%L",
          second: "%H:%M:%S",
          minute: "%H:%M",
          hour: "%H:%M",
          day: "%e. %b",
          week: "%e. %b",
          month: "%b '%y",
          year: "%Y"
        },
        endOnTick: !1,
        labels: {
          enabled: !0,
          style: {
            color: "#666666",
            cursor: "default",
            fontSize: "11px"
          },
          x: 0
        },
        maxPadding: .01,
        minorTickLength: 2,
        minorTickPosition: "outside",
        minPadding: .01,
        startOfWeek: 1,
        startOnTick: !1,
        tickLength: 10,
        tickmarkPlacement: "between",
        tickPixelInterval: 100,
        tickPosition: "outside",
        title: {
          align: "middle",
          style: {
            color: "#666666"
          }
        },
        type: "linear",
        minorGridLineColor: "#f2f2f2",
        minorGridLineWidth: 1,
        minorTickColor: "#999999",
        lineColor: "#ccd6eb",
        lineWidth: 1,
        gridLineColor: "#e6e6e6",
        tickColor: "#ccd6eb"
      },
      defaultYAxisOptions: {
        endOnTick: !0,
        tickPixelInterval: 72,
        showLastLabel: !0,
        labels: {
          x: -8
        },
        maxPadding: .05,
        minPadding: .05,
        startOnTick: !0,
        title: {
          rotation: 270,
          text: "Values"
        },
        stackLabels: {
          allowOverlap: !1,
          enabled: !1,
          formatter: function() {
            return a.numberFormat(this.total, -1)
          },
          style: {
            fontSize: "11px",
            fontWeight: "bold",
            color: "#000000",
            textOutline: "1px contrast"
          }
        },
        gridLineWidth: 1,
        lineWidth: 0
      },
      defaultLeftAxisOptions: {
        labels: {
          x: -15
        },
        title: {
          rotation: 270
        }
      },
      defaultRightAxisOptions: {
        labels: {
          x: 15
        },
        title: {
          rotation: 90
        }
      },
      defaultBottomAxisOptions: {
        labels: {
          autoRotation: [-45],
          x: 0
        },
        title: {
          rotation: 0
        }
      },
      defaultTopAxisOptions: {
        labels: {
          autoRotation: [-45],
          x: 0
        },
        title: {
          rotation: 0
        }
      },
      init: function(a, d) {
        var k = d.isX,
          b = this;
        b.chart = a;
        b.horiz = a.inverted && !b.isZAxis ? !k : k;
        b.isXAxis = k;
        b.coll = b.coll ||
          (k ? "xAxis" : "yAxis");
        e(this, "init", {
          userOptions: d
        });
        b.opposite = d.opposite;
        b.side = d.side || (b.horiz ? b.opposite ? 0 : 2 : b.opposite ? 1 : 3);
        b.setOptions(d);
        var A = this.options,
          f = A.type;
        b.labelFormatter = A.labels.formatter || b.defaultLabelFormatter;
        b.userOptions = d;
        b.minPixelPadding = 0;
        b.reversed = A.reversed;
        b.visible = !1 !== A.visible;
        b.zoomEnabled = !1 !== A.zoomEnabled;
        b.hasNames = "category" === f || !0 === A.categories;
        b.categories = A.categories || b.hasNames;
        b.names || (b.names = [], b.names.keys = {});
        b.plotLinesAndBandsGroups = {};
        b.isLog =
          "logarithmic" === f;
        b.isDatetimeAxis = "datetime" === f;
        b.positiveValuesOnly = b.isLog && !b.allowNegativeLog;
        b.isLinked = z(A.linkedTo);
        b.ticks = {};
        b.labelEdge = [];
        b.minorTicks = {};
        b.plotLinesAndBands = [];
        b.alternateBands = {};
        b.len = 0;
        b.minRange = b.userMinRange = A.minRange || A.maxZoom;
        b.range = A.range;
        b.offset = A.offset || 0;
        b.stacks = {};
        b.oldStacks = {};
        b.stacksTouched = 0;
        b.max = null;
        b.min = null;
        b.crosshair = F(A.crosshair, K(a.options.tooltip.crosshairs)[k ? 0 : 1], !1);
        d = b.options.events; - 1 === c(b, a.axes) && (k ? a.axes.splice(a.xAxis.length,
          0, b) : a.axes.push(b), a[b.coll].push(b));
        b.series = b.series || [];
        a.inverted && !b.isZAxis && k && void 0 === b.reversed && (b.reversed = !0);
        q(d, function(a, k) {
          B(b, k, a)
        });
        b.lin2log = A.linearToLogConverter || b.lin2log;
        b.isLog && (b.val2lin = b.log2lin, b.lin2val = b.lin2log);
        e(this, "afterInit")
      },
      setOptions: function(a) {
        this.options = r(this.defaultOptions, "yAxis" === this.coll && this.defaultYAxisOptions, [this.defaultTopAxisOptions, this.defaultRightAxisOptions, this.defaultBottomAxisOptions, this.defaultLeftAxisOptions][this.side],
          r(v[this.coll], a));
        e(this, "afterSetOptions", {
          userOptions: a
        })
      },
      defaultLabelFormatter: function() {
        var k = this.axis,
          d = this.value,
          b = k.chart.time,
          c = k.categories,
          f = this.dateTimeLabelFormat,
          h = v.lang,
          x = h.numericSymbols,
          h = h.numericSymbolMagnitude || 1E3,
          e = x && x.length,
          r, n = k.options.labels.format,
          k = k.isLog ? Math.abs(d) : k.tickInterval;
        if (n) r = t(n, this, b);
        else if (c) r = d;
        else if (f) r = b.dateFormat(f, d);
        else if (e && 1E3 <= k)
          for (; e-- && void 0 === r;) b = Math.pow(h, e + 1), k >= b && 0 === 10 * d % b && null !== x[e] && 0 !== d && (r = a.numberFormat(d / b, -1) + x[e]);
        void 0 === r && (r = 1E4 <= Math.abs(d) ? a.numberFormat(d, -1) : a.numberFormat(d, -1, void 0, ""));
        return r
      },
      getSeriesExtremes: function() {
        var a = this,
          d = a.chart;
        e(this, "getSeriesExtremes", null, function() {
          a.hasVisibleSeries = !1;
          a.dataMin = a.dataMax = a.threshold = null;
          a.softThreshold = !a.isXAxis;
          a.buildStacks && a.buildStacks();
          l(a.series, function(k) {
            if (k.visible || !d.options.chart.ignoreHiddenSeries) {
              var b = k.options,
                A = b.threshold,
                c;
              a.hasVisibleSeries = !0;
              a.positiveValuesOnly && 0 >= A && (A = null);
              if (a.isXAxis) b = k.xData,
                b.length && (k = p(b), c = G(b), w(k) || k instanceof Date || (b = f(b, w), k = p(b), c = G(b)), b.length && (a.dataMin = Math.min(F(a.dataMin, b[0], k), k), a.dataMax = Math.max(F(a.dataMax, b[0], c), c)));
              else if (k.getExtremes(), c = k.dataMax, k = k.dataMin, z(k) && z(c) && (a.dataMin = Math.min(F(a.dataMin, k), k), a.dataMax = Math.max(F(a.dataMax, c), c)), z(A) && (a.threshold = A), !b.softThreshold || a.positiveValuesOnly) a.softThreshold = !1
            }
          })
        });
        e(this, "afterGetSeriesExtremes")
      },
      translate: function(a, d, b, c, f, h) {
        var k = this.linkedParent || this,
          A = 1,
          x = 0,
          I = c ?
          k.oldTransA : k.transA;
        c = c ? k.oldMin : k.min;
        var e = k.minPixelPadding;
        f = (k.isOrdinal || k.isBroken || k.isLog && f) && k.lin2val;
        I || (I = k.transA);
        b && (A *= -1, x = k.len);
        k.reversed && (A *= -1, x -= A * (k.sector || k.len));
        d ? (a = (a * A + x - e) / I + c, f && (a = k.lin2val(a))) : (f && (a = k.val2lin(a)), a = w(c) ? A * (a - c) * I + x + A * e + (w(h) ? I * h : 0) : void 0);
        return a
      },
      toPixels: function(a, d) {
        return this.translate(a, !1, !this.horiz, null, !0) + (d ? 0 : this.pos)
      },
      toValue: function(a, d) {
        return this.translate(a - (d ? 0 : this.pos), !0, !this.horiz, null, !0)
      },
      getPlotLinePath: function(a,
        d, b, c, f) {
        var k = this.chart,
          A = this.left,
          h = this.top,
          x, I, e = b && k.oldChartHeight || k.chartHeight,
          r = b && k.oldChartWidth || k.chartWidth,
          n;
        x = this.transB;
        var q = function(a, k, d) {
          if (a < k || a > d) c ? a = Math.min(Math.max(k, a), d) : n = !0;
          return a
        };
        f = F(f, this.translate(a, null, null, b));
        f = Math.min(Math.max(-1E5, f), 1E5);
        a = b = Math.round(f + x);
        x = I = Math.round(e - f - x);
        w(f) ? this.horiz ? (x = h, I = e - this.bottom, a = b = q(a, A, A + this.width)) : (a = A, b = r - this.right, x = I = q(x, h, h + this.height)) : (n = !0, c = !1);
        return n && !c ? null : k.renderer.crispLine(["M", a, x, "L",
          b, I
        ], d || 1)
      },
      getLinearTickPositions: function(a, d, b) {
        var k, A = g(Math.floor(d / a) * a);
        b = g(Math.ceil(b / a) * a);
        var c = [],
          f;
        g(A + a) === A && (f = 20);
        if (this.single) return [d];
        for (d = A; d <= b;) {
          c.push(d);
          d = g(d + a, f);
          if (d === k) break;
          k = d
        }
        return c
      },
      getMinorTickInterval: function() {
        var a = this.options;
        return !0 === a.minorTicks ? F(a.minorTickInterval, "auto") : !1 === a.minorTicks ? null : a.minorTickInterval
      },
      getMinorTickPositions: function() {
        var a = this,
          d = a.options,
          b = a.tickPositions,
          c = a.minorTickInterval,
          f = [],
          h = a.pointRangePadding || 0,
          x = a.min -
          h,
          h = a.max + h,
          e = h - x;
        if (e && e / c < a.len / 3)
          if (a.isLog) l(this.paddedTicks, function(k, d, b) {
            d && f.push.apply(f, a.getLogTickPositions(c, b[d - 1], b[d], !0))
          });
          else if (a.isDatetimeAxis && "auto" === this.getMinorTickInterval()) f = f.concat(a.getTimeTicks(a.normalizeTimeTickInterval(c), x, h, d.startOfWeek));
        else
          for (d = x + (b[0] - x) % c; d <= h && d !== f[0]; d += c) f.push(d);
        0 !== f.length && a.trimTicks(f);
        return f
      },
      adjustForMinRange: function() {
        var a = this.options,
          d = this.min,
          b = this.max,
          c, f, h, x, e, r, n, q;
        this.isXAxis && void 0 === this.minRange && !this.isLog &&
          (z(a.min) || z(a.max) ? this.minRange = null : (l(this.series, function(a) {
            r = a.xData;
            for (x = n = a.xIncrement ? 1 : r.length - 1; 0 < x; x--)
              if (e = r[x] - r[x - 1], void 0 === h || e < h) h = e
          }), this.minRange = Math.min(5 * h, this.dataMax - this.dataMin)));
        b - d < this.minRange && (f = this.dataMax - this.dataMin >= this.minRange, q = this.minRange, c = (q - b + d) / 2, c = [d - c, F(a.min, d - c)], f && (c[2] = this.isLog ? this.log2lin(this.dataMin) : this.dataMin), d = G(c), b = [d + q, F(a.max, d + q)], f && (b[2] = this.isLog ? this.log2lin(this.dataMax) : this.dataMax), b = p(b), b - d < q && (c[0] = b - q, c[1] =
          F(a.min, b - q), d = G(c)));
        this.min = d;
        this.max = b
      },
      getClosest: function() {
        var a;
        this.categories ? a = 1 : l(this.series, function(k) {
          var d = k.closestPointRange,
            b = k.visible || !k.chart.options.chart.ignoreHiddenSeries;
          !k.noSharedTooltip && z(d) && b && (a = z(a) ? Math.min(a, d) : d)
        });
        return a
      },
      nameToX: function(a) {
        var k = h(this.categories),
          d = k ? this.categories : this.names,
          b = a.options.x,
          f;
        a.series.requireSorting = !1;
        z(b) || (b = !1 === this.options.uniqueNames ? a.series.autoIncrement() : k ? c(a.name, d) : F(d.keys[a.name], -1)); - 1 === b ? k || (f = d.length) :
          f = b;
        void 0 !== f && (this.names[f] = a.name, this.names.keys[a.name] = f);
        return f
      },
      updateNames: function() {
        var k = this,
          d = this.names;
        0 < d.length && (l(a.keys(d.keys), function(a) {
          delete d.keys[a]
        }), d.length = 0, this.minRange = this.userMinRange, l(this.series || [], function(a) {
          a.xIncrement = null;
          if (!a.points || a.isDirtyData) a.processData(), a.generatePoints();
          l(a.points, function(d, b) {
            var c;
            d.options && (c = k.nameToX(d), void 0 !== c && c !== d.x && (d.x = c, a.xData[b] = c))
          })
        }))
      },
      setAxisTranslation: function(a) {
        var k = this,
          d = k.max - k.min,
          b =
          k.axisPointRange || 0,
          c, f = 0,
          h = 0,
          x = k.linkedParent,
          r = !!k.categories,
          n = k.transA,
          q = k.isXAxis;
        if (q || r || b) c = k.getClosest(), x ? (f = x.minPointOffset, h = x.pointRangePadding) : l(k.series, function(a) {
          var d = r ? 1 : q ? F(a.options.pointRange, c, 0) : k.axisPointRange || 0;
          a = a.options.pointPlacement;
          b = Math.max(b, d);
          k.single || (f = Math.max(f, D(a) ? 0 : d / 2), h = Math.max(h, "on" === a ? 0 : d))
        }), x = k.ordinalSlope && c ? k.ordinalSlope / c : 1, k.minPointOffset = f *= x, k.pointRangePadding = h *= x, k.pointRange = Math.min(b, d), q && (k.closestPointRange = c);
        a && (k.oldTransA =
          n);
        k.translationSlope = k.transA = n = k.options.staticScale || k.len / (d + h || 1);
        k.transB = k.horiz ? k.left : k.bottom;
        k.minPixelPadding = n * f;
        e(this, "afterSetAxisTranslation")
      },
      minFromRange: function() {
        return this.max - this.range
      },
      setTickInterval: function(k) {
        var d = this,
          b = d.chart,
          c = d.options,
          f = d.isLog,
          h = d.isDatetimeAxis,
          x = d.isXAxis,
          r = d.isLinked,
          q = c.maxPadding,
          E = c.minPadding,
          D = c.tickInterval,
          H = c.tickPixelInterval,
          t = d.categories,
          K = w(d.threshold) ? d.threshold : null,
          m = d.softThreshold,
          y, v, u, p;
        h || t || r || this.getTickAmount();
        u = F(d.userMin, c.min);
        p = F(d.userMax, c.max);
        r ? (d.linkedParent = b[d.coll][c.linkedTo], b = d.linkedParent.getExtremes(), d.min = F(b.min, b.dataMin), d.max = F(b.max, b.dataMax), c.type !== d.linkedParent.options.type && a.error(11, 1)) : (!m && z(K) && (d.dataMin >= K ? (y = K, E = 0) : d.dataMax <= K && (v = K, q = 0)), d.min = F(u, y, d.dataMin), d.max = F(p, v, d.dataMax));
        f && (d.positiveValuesOnly && !k && 0 >= Math.min(d.min, F(d.dataMin, d.min)) && a.error(10, 1), d.min = g(d.log2lin(d.min), 15), d.max = g(d.log2lin(d.max), 15));
        d.range && z(d.max) && (d.userMin = d.min =
          u = Math.max(d.dataMin, d.minFromRange()), d.userMax = p = d.max, d.range = null);
        e(d, "foundExtremes");
        d.beforePadding && d.beforePadding();
        d.adjustForMinRange();
        !(t || d.axisPointRange || d.usePercentage || r) && z(d.min) && z(d.max) && (b = d.max - d.min) && (!z(u) && E && (d.min -= b * E), !z(p) && q && (d.max += b * q));
        w(c.softMin) && !w(d.userMin) && (d.min = Math.min(d.min, c.softMin));
        w(c.softMax) && !w(d.userMax) && (d.max = Math.max(d.max, c.softMax));
        w(c.floor) && (d.min = Math.max(d.min, c.floor));
        w(c.ceiling) && (d.max = Math.min(d.max, c.ceiling));
        m && z(d.dataMin) &&
          (K = K || 0, !z(u) && d.min < K && d.dataMin >= K ? d.min = K : !z(p) && d.max > K && d.dataMax <= K && (d.max = K));
        d.tickInterval = d.min === d.max || void 0 === d.min || void 0 === d.max ? 1 : r && !D && H === d.linkedParent.options.tickPixelInterval ? D = d.linkedParent.tickInterval : F(D, this.tickAmount ? (d.max - d.min) / Math.max(this.tickAmount - 1, 1) : void 0, t ? 1 : (d.max - d.min) * H / Math.max(d.len, H));
        x && !k && l(d.series, function(a) {
          a.processData(d.min !== d.oldMin || d.max !== d.oldMax)
        });
        d.setAxisTranslation(!0);
        d.beforeSetTickPositions && d.beforeSetTickPositions();
        d.postProcessTickInterval && (d.tickInterval = d.postProcessTickInterval(d.tickInterval));
        d.pointRange && !D && (d.tickInterval = Math.max(d.pointRange, d.tickInterval));
        k = F(c.minTickInterval, d.isDatetimeAxis && d.closestPointRange);
        !D && d.tickInterval < k && (d.tickInterval = k);
        h || f || D || (d.tickInterval = J(d.tickInterval, null, n(d.tickInterval), F(c.allowDecimals, !(.5 < d.tickInterval && 5 > d.tickInterval && 1E3 < d.max && 9999 > d.max)), !!this.tickAmount));
        this.tickAmount || (d.tickInterval = d.unsquish());
        this.setTickPositions()
      },
      setTickPositions: function() {
        var a =
          this.options,
          d, b = a.tickPositions;
        d = this.getMinorTickInterval();
        var c = a.tickPositioner,
          f = a.startOnTick,
          h = a.endOnTick;
        this.tickmarkOffset = this.categories && "between" === a.tickmarkPlacement && 1 === this.tickInterval ? .5 : 0;
        this.minorTickInterval = "auto" === d && this.tickInterval ? this.tickInterval / 5 : d;
        this.single = this.min === this.max && z(this.min) && !this.tickAmount && (parseInt(this.min, 10) === this.min || !1 !== a.allowDecimals);
        this.tickPositions = d = b && b.slice();
        !d && (d = this.isDatetimeAxis ? this.getTimeTicks(this.normalizeTimeTickInterval(this.tickInterval,
          a.units), this.min, this.max, a.startOfWeek, this.ordinalPositions, this.closestPointRange, !0) : this.isLog ? this.getLogTickPositions(this.tickInterval, this.min, this.max) : this.getLinearTickPositions(this.tickInterval, this.min, this.max), d.length > this.len && (d = [d[0], d.pop()], d[0] === d[1] && (d.length = 1)), this.tickPositions = d, c && (c = c.apply(this, [this.min, this.max]))) && (this.tickPositions = d = c);
        this.paddedTicks = d.slice(0);
        this.trimTicks(d, f, h);
        this.isLinked || (this.single && 2 > d.length && (this.min -= .5, this.max += .5), b ||
          c || this.adjustTickAmount());
        e(this, "afterSetTickPositions")
      },
      trimTicks: function(a, d, b) {
        var k = a[0],
          c = a[a.length - 1],
          f = this.minPointOffset || 0;
        if (!this.isLinked) {
          if (d && -Infinity !== k) this.min = k;
          else
            for (; this.min - f > a[0];) a.shift();
          if (b) this.max = c;
          else
            for (; this.max + f < a[a.length - 1];) a.pop();
          0 === a.length && z(k) && !this.options.tickPositions && a.push((c + k) / 2)
        }
      },
      alignToOthers: function() {
        var a = {},
          d, b = this.options;
        !1 === this.chart.options.chart.alignTicks || !1 === b.alignTicks || !1 === b.startOnTick || !1 === b.endOnTick ||
          this.isLog || l(this.chart[this.coll], function(k) {
            var b = k.options,
              b = [k.horiz ? b.left : b.top, b.width, b.height, b.pane].join();
            k.series.length && (a[b] ? d = !0 : a[b] = 1)
          });
        return d
      },
      getTickAmount: function() {
        var a = this.options,
          d = a.tickAmount,
          b = a.tickPixelInterval;
        !z(a.tickInterval) && this.len < b && !this.isRadial && !this.isLog && a.startOnTick && a.endOnTick && (d = 2);
        !d && this.alignToOthers() && (d = Math.ceil(this.len / b) + 1);
        4 > d && (this.finalTickAmt = d, d = 5);
        this.tickAmount = d
      },
      adjustTickAmount: function() {
        var a = this.tickInterval,
          d =
          this.tickPositions,
          b = this.tickAmount,
          c = this.finalTickAmt,
          f = d && d.length,
          h = F(this.threshold, this.softThreshold ? 0 : null);
        if (this.hasData()) {
          if (f < b) {
            for (; d.length < b;) d.length % 2 || this.min === h ? d.push(g(d[d.length - 1] + a)) : d.unshift(g(d[0] - a));
            this.transA *= (f - 1) / (b - 1);
            this.min = d[0];
            this.max = d[d.length - 1]
          } else f > b && (this.tickInterval *= 2, this.setTickPositions());
          if (z(c)) {
            for (a = b = d.length; a--;)(3 === c && 1 === a % 2 || 2 >= c && 0 < a && a < b - 1) && d.splice(a, 1);
            this.finalTickAmt = void 0
          }
        }
      },
      setScale: function() {
        var a, d;
        this.oldMin =
          this.min;
        this.oldMax = this.max;
        this.oldAxisLength = this.len;
        this.setAxisSize();
        d = this.len !== this.oldAxisLength;
        l(this.series, function(d) {
          if (d.isDirtyData || d.isDirty || d.xAxis.isDirty) a = !0
        });
        d || a || this.isLinked || this.forceRedraw || this.userMin !== this.oldUserMin || this.userMax !== this.oldUserMax || this.alignToOthers() ? (this.resetStacks && this.resetStacks(), this.forceRedraw = !1, this.getSeriesExtremes(), this.setTickInterval(), this.oldUserMin = this.userMin, this.oldUserMax = this.userMax, this.isDirty || (this.isDirty =
          d || this.min !== this.oldMin || this.max !== this.oldMax)) : this.cleanStacks && this.cleanStacks();
        e(this, "afterSetScale")
      },
      setExtremes: function(a, d, c, f, h) {
        var k = this,
          x = k.chart;
        c = F(c, !0);
        l(k.series, function(a) {
          delete a.kdTree
        });
        h = b(h, {
          min: a,
          max: d
        });
        e(k, "setExtremes", h, function() {
          k.userMin = a;
          k.userMax = d;
          k.eventArgs = h;
          c && x.redraw(f)
        })
      },
      zoom: function(a, d) {
        var k = this.dataMin,
          b = this.dataMax,
          c = this.options,
          f = Math.min(k, F(c.min, k)),
          c = Math.max(b, F(c.max, b));
        if (a !== this.min || d !== this.max) this.allowZoomOutside || (z(k) &&
          (a < f && (a = f), a > c && (a = c)), z(b) && (d < f && (d = f), d > c && (d = c))), this.displayBtn = void 0 !== a || void 0 !== d, this.setExtremes(a, d, !1, void 0, {
          trigger: "zoom"
        });
        return !0
      },
      setAxisSize: function() {
        var d = this.chart,
          b = this.options,
          c = b.offsets || [0, 0, 0, 0],
          f = this.horiz,
          h = this.width = Math.round(a.relativeLength(F(b.width, d.plotWidth - c[3] + c[1]), d.plotWidth)),
          x = this.height = Math.round(a.relativeLength(F(b.height, d.plotHeight - c[0] + c[2]), d.plotHeight)),
          e = this.top = Math.round(a.relativeLength(F(b.top, d.plotTop + c[0]), d.plotHeight, d.plotTop)),
          b = this.left = Math.round(a.relativeLength(F(b.left, d.plotLeft + c[3]), d.plotWidth, d.plotLeft));
        this.bottom = d.chartHeight - x - e;
        this.right = d.chartWidth - h - b;
        this.len = Math.max(f ? h : x, 0);
        this.pos = f ? b : e
      },
      getExtremes: function() {
        var a = this.isLog;
        return {
          min: a ? g(this.lin2log(this.min)) : this.min,
          max: a ? g(this.lin2log(this.max)) : this.max,
          dataMin: this.dataMin,
          dataMax: this.dataMax,
          userMin: this.userMin,
          userMax: this.userMax
        }
      },
      getThreshold: function(a) {
        var d = this.isLog,
          k = d ? this.lin2log(this.min) : this.min,
          d = d ? this.lin2log(this.max) :
          this.max;
        null === a || -Infinity === a ? a = k : Infinity === a ? a = d : k > a ? a = k : d < a && (a = d);
        return this.translate(a, 0, 1, 0, 1)
      },
      autoLabelAlign: function(a) {
        a = (F(a, 0) - 90 * this.side + 720) % 360;
        return 15 < a && 165 > a ? "right" : 195 < a && 345 > a ? "left" : "center"
      },
      tickSize: function(a) {
        var d = this.options,
          k = d[a + "Length"],
          b = F(d[a + "Width"], "tick" === a && this.isXAxis ? 1 : 0);
        if (b && k) return "inside" === d[a + "Position"] && (k = -k), [k, b]
      },
      labelMetrics: function() {
        var a = this.tickPositions && this.tickPositions[0] || 0;
        return this.chart.renderer.fontMetrics(this.options.labels.style &&
          this.options.labels.style.fontSize, this.ticks[a] && this.ticks[a].label)
      },
      unsquish: function() {
        var a = this.options.labels,
          d = this.horiz,
          b = this.tickInterval,
          c = b,
          f = this.len / (((this.categories ? 1 : 0) + this.max - this.min) / b),
          h, x = a.rotation,
          e = this.labelMetrics(),
          r, q = Number.MAX_VALUE,
          n, w = function(a) {
            a /= f || 1;
            a = 1 < a ? Math.ceil(a) : 1;
            return g(a * b)
          };
        d ? (n = !a.staggerLines && !a.step && (z(x) ? [x] : f < F(a.autoRotationLimit, 80) && a.autoRotation)) && l(n, function(a) {
          var d;
          if (a === x || a && -90 <= a && 90 >= a) r = w(Math.abs(e.h / Math.sin(u * a))), d =
            r + Math.abs(a / 360), d < q && (q = d, h = a, c = r)
        }) : a.step || (c = w(e.h));
        this.autoRotation = n;
        this.labelRotation = F(h, x);
        return c
      },
      getSlotWidth: function() {
        var a = this.chart,
          d = this.horiz,
          b = this.options.labels,
          c = Math.max(this.tickPositions.length - (this.categories ? 0 : 1), 1),
          f = a.margin[3];
        return d && 2 > (b.step || 0) && !b.rotation && (this.staggerLines || 1) * this.len / c || !d && (b.style && parseInt(b.style.width, 10) || f && f - a.spacing[3] || .33 * a.chartWidth)
      },
      renderUnsquish: function() {
        var a = this.chart,
          d = a.renderer,
          b = this.tickPositions,
          c = this.ticks,
          f = this.options.labels,
          h = this.horiz,
          x = this.getSlotWidth(),
          e = Math.max(1, Math.round(x - 2 * (f.padding || 5))),
          r = {},
          q = this.labelMetrics(),
          n = f.style && f.style.textOverflow,
          w, E, H = 0,
          t;
        D(f.rotation) || (r.rotation = f.rotation || 0);
        l(b, function(a) {
          (a = c[a]) && a.label && a.label.textPxLength > H && (H = a.label.textPxLength)
        });
        this.maxLabelLength = H;
        if (this.autoRotation) H > e && H > q.h ? r.rotation = this.labelRotation : this.labelRotation = 0;
        else if (x && (w = e, !n))
          for (E = "clip", e = b.length; !h && e--;)
            if (t = b[e], t = c[t].label) t.styles && "ellipsis" ===
              t.styles.textOverflow ? t.css({
                textOverflow: "clip"
              }) : t.textPxLength > x && t.css({
                width: x + "px"
              }), t.getBBox().height > this.len / b.length - (q.h - q.f) && (t.specificTextOverflow = "ellipsis");
        r.rotation && (w = H > .5 * a.chartHeight ? .33 * a.chartHeight : a.chartHeight, n || (E = "ellipsis"));
        if (this.labelAlign = f.align || this.autoLabelAlign(this.labelRotation)) r.align = this.labelAlign;
        l(b, function(a) {
          var d = (a = c[a]) && a.label,
            b = {};
          d && (d.attr(r), !w || f.style && f.style.width || !(w < d.textPxLength || "SPAN" === d.element.tagName) || (b.width = w, n ||
            (b.textOverflow = d.specificTextOverflow || E), d.css(b)), delete d.specificTextOverflow, a.rotation = r.rotation)
        });
        this.tickRotCorr = d.rotCorr(q.b, this.labelRotation || 0, 0 !== this.side)
      },
      hasData: function() {
        return this.hasVisibleSeries || z(this.min) && z(this.max) && this.tickPositions && 0 < this.tickPositions.length
      },
      addTitle: function(a) {
        var d = this.chart.renderer,
          b = this.horiz,
          k = this.opposite,
          c = this.options.title,
          f;
        this.axisTitle || ((f = c.textAlign) || (f = (b ? {
          low: "left",
          middle: "center",
          high: "right"
        } : {
          low: k ? "right" : "left",
          middle: "center",
          high: k ? "left" : "right"
        })[c.align]), this.axisTitle = d.text(c.text, 0, 0, c.useHTML).attr({
          zIndex: 7,
          rotation: c.rotation || 0,
          align: f
        }).addClass("highcharts-axis-title").css(r(c.style)).add(this.axisGroup), this.axisTitle.isNew = !0);
        c.style.width || this.isRadial || this.axisTitle.css({
          width: this.len
        });
        this.axisTitle[a ? "show" : "hide"](!0)
      },
      generateTick: function(a) {
        var d = this.ticks;
        d[a] ? d[a].addLabel() : d[a] = new H(this, a)
      },
      getOffset: function() {
        var a = this,
          d = a.chart,
          b = d.renderer,
          c = a.options,
          f = a.tickPositions,
          h = a.ticks,
          x = a.horiz,
          e = a.side,
          r = d.inverted && !a.isZAxis ? [1, 0, 3, 2][e] : e,
          n, w, E = 0,
          D, H = 0,
          t = c.title,
          K = c.labels,
          g = 0,
          J = d.axisOffset,
          d = d.clipOffset,
          m = [-1, 1, 1, -1][e],
          y = c.className,
          v = a.axisParent,
          u = this.tickSize("tick");
        n = a.hasData();
        a.showAxis = w = n || F(c.showEmpty, !0);
        a.staggerLines = a.horiz && K.staggerLines;
        a.axisGroup || (a.gridGroup = b.g("grid").attr({
          zIndex: c.gridZIndex || 1
        }).addClass("highcharts-" + this.coll.toLowerCase() + "-grid " + (y || "")).add(v), a.axisGroup = b.g("axis").attr({
          zIndex: c.zIndex || 2
        }).addClass("highcharts-" +
          this.coll.toLowerCase() + " " + (y || "")).add(v), a.labelGroup = b.g("axis-labels").attr({
          zIndex: K.zIndex || 7
        }).addClass("highcharts-" + a.coll.toLowerCase() + "-labels " + (y || "")).add(v));
        n || a.isLinked ? (l(f, function(d, b) {
            a.generateTick(d, b)
          }), a.renderUnsquish(), a.reserveSpaceDefault = 0 === e || 2 === e || {
            1: "left",
            3: "right"
          }[e] === a.labelAlign, F(K.reserveSpace, "center" === a.labelAlign ? !0 : null, a.reserveSpaceDefault) && l(f, function(a) {
            g = Math.max(h[a].getLabelSize(), g)
          }), a.staggerLines && (g *= a.staggerLines), a.labelOffset = g *
          (a.opposite ? -1 : 1)) : q(h, function(a, d) {
          a.destroy();
          delete h[d]
        });
        t && t.text && !1 !== t.enabled && (a.addTitle(w), w && !1 !== t.reserveSpace && (a.titleOffset = E = a.axisTitle.getBBox()[x ? "height" : "width"], D = t.offset, H = z(D) ? 0 : F(t.margin, x ? 5 : 10)));
        a.renderLine();
        a.offset = m * F(c.offset, J[e]);
        a.tickRotCorr = a.tickRotCorr || {
          x: 0,
          y: 0
        };
        b = 0 === e ? -a.labelMetrics().h : 2 === e ? a.tickRotCorr.y : 0;
        H = Math.abs(g) + H;
        g && (H = H - b + m * (x ? F(K.y, a.tickRotCorr.y + 8 * m) : K.x));
        a.axisTitleMargin = F(D, H);
        J[e] = Math.max(J[e], a.axisTitleMargin + E + m * a.offset,
          H, n && f.length && u ? u[0] + m * a.offset : 0);
        c = c.offset ? 0 : 2 * Math.floor(a.axisLine.strokeWidth() / 2);
        d[r] = Math.max(d[r], c)
      },
      getLinePath: function(a) {
        var d = this.chart,
          b = this.opposite,
          k = this.offset,
          c = this.horiz,
          f = this.left + (b ? this.width : 0) + k,
          k = d.chartHeight - this.bottom - (b ? this.height : 0) + k;
        b && (a *= -1);
        return d.renderer.crispLine(["M", c ? this.left : f, c ? k : this.top, "L", c ? d.chartWidth - this.right : f, c ? k : d.chartHeight - this.bottom], a)
      },
      renderLine: function() {
        this.axisLine || (this.axisLine = this.chart.renderer.path().addClass("highcharts-axis-line").add(this.axisGroup),
          this.axisLine.attr({
            stroke: this.options.lineColor,
            "stroke-width": this.options.lineWidth,
            zIndex: 7
          }))
      },
      getTitlePosition: function() {
        var a = this.horiz,
          d = this.left,
          b = this.top,
          c = this.len,
          f = this.options.title,
          h = a ? d : b,
          x = this.opposite,
          e = this.offset,
          r = f.x || 0,
          n = f.y || 0,
          q = this.axisTitle,
          w = this.chart.renderer.fontMetrics(f.style && f.style.fontSize, q),
          q = Math.max(q.getBBox(null, 0).height - w.h - 1, 0),
          c = {
            low: h + (a ? 0 : c),
            middle: h + c / 2,
            high: h + (a ? c : 0)
          }[f.align],
          d = (a ? b + this.height : d) + (a ? 1 : -1) * (x ? -1 : 1) * this.axisTitleMargin + [-q,
            q, w.f, -q
          ][this.side];
        return {
          x: a ? c + r : d + (x ? this.width : 0) + e + r,
          y: a ? d + n - (x ? this.height : 0) + e : c + n
        }
      },
      renderMinorTick: function(a) {
        var d = this.chart.hasRendered && w(this.oldMin),
          b = this.minorTicks;
        b[a] || (b[a] = new H(this, a, "minor"));
        d && b[a].isNew && b[a].render(null, !0);
        b[a].render(null, !1, 1)
      },
      renderTick: function(a, d) {
        var b = this.isLinked,
          k = this.ticks,
          c = this.chart.hasRendered && w(this.oldMin);
        if (!b || a >= this.min && a <= this.max) k[a] || (k[a] = new H(this, a)), c && k[a].isNew && k[a].render(d, !0, .1), k[a].render(d)
      },
      render: function() {
        var b =
          this,
          c = b.chart,
          f = b.options,
          h = b.isLog,
          x = b.isLinked,
          r = b.tickPositions,
          n = b.axisTitle,
          E = b.ticks,
          D = b.minorTicks,
          t = b.alternateBands,
          K = f.stackLabels,
          F = f.alternateGridColor,
          g = b.tickmarkOffset,
          J = b.axisLine,
          m = b.showAxis,
          y = C(c.renderer.globalAnimation),
          v, u;
        b.labelEdge.length = 0;
        b.overlap = !1;
        l([E, D, t], function(a) {
          q(a, function(a) {
            a.isActive = !1
          })
        });
        if (b.hasData() || x) b.minorTickInterval && !b.categories && l(b.getMinorTickPositions(), function(a) {
          b.renderMinorTick(a)
        }), r.length && (l(r, function(a, d) {
            b.renderTick(a, d)
          }),
          g && (0 === b.min || b.single) && (E[-1] || (E[-1] = new H(b, -1, null, !0)), E[-1].render(-1))), F && l(r, function(d, k) {
          u = void 0 !== r[k + 1] ? r[k + 1] + g : b.max - g;
          0 === k % 2 && d < b.max && u <= b.max + (c.polar ? -g : g) && (t[d] || (t[d] = new a.PlotLineOrBand(b)), v = d + g, t[d].options = {
            from: h ? b.lin2log(v) : v,
            to: h ? b.lin2log(u) : u,
            color: F
          }, t[d].render(), t[d].isActive = !0)
        }), b._addedPlotLB || (l((f.plotLines || []).concat(f.plotBands || []), function(a) {
          b.addPlotBandOrLine(a)
        }), b._addedPlotLB = !0);
        l([E, D, t], function(a) {
          var b, k = [],
            f = y.duration;
          q(a, function(a,
            d) {
            a.isActive || (a.render(d, !1, 0), a.isActive = !1, k.push(d))
          });
          d(function() {
            for (b = k.length; b--;) a[k[b]] && !a[k[b]].isActive && (a[k[b]].destroy(), delete a[k[b]])
          }, a !== t && c.hasRendered && f ? f : 0)
        });
        J && (J[J.isPlaced ? "animate" : "attr"]({
          d: this.getLinePath(J.strokeWidth())
        }), J.isPlaced = !0, J[m ? "show" : "hide"](!0));
        n && m && (f = b.getTitlePosition(), w(f.y) ? (n[n.isNew ? "attr" : "animate"](f), n.isNew = !1) : (n.attr("y", -9999), n.isNew = !0));
        K && K.enabled && b.renderStackTotals();
        b.isDirty = !1;
        e(this, "afterRender")
      },
      redraw: function() {
        this.visible &&
          (this.render(), l(this.plotLinesAndBands, function(a) {
            a.render()
          }));
        l(this.series, function(a) {
          a.isDirty = !0
        })
      },
      keepProps: "extKey hcEvents names series userMax userMin".split(" "),
      destroy: function(a) {
        var d = this,
          b = d.stacks,
          k = d.plotLinesAndBands,
          f;
        e(this, "destroy", {
          keepEvents: a
        });
        a || x(d);
        q(b, function(a, d) {
          y(a);
          b[d] = null
        });
        l([d.ticks, d.minorTicks, d.alternateBands], function(a) {
          y(a)
        });
        if (k)
          for (a = k.length; a--;) k[a].destroy();
        l("stackTotalGroup axisLine axisTitle axisGroup gridGroup labelGroup cross".split(" "),
          function(a) {
            d[a] && (d[a] = d[a].destroy())
          });
        for (f in d.plotLinesAndBandsGroups) d.plotLinesAndBandsGroups[f] = d.plotLinesAndBandsGroups[f].destroy();
        q(d, function(a, b) {
          -1 === c(b, d.keepProps) && delete d[b]
        })
      },
      drawCrosshair: function(a, d) {
        var b, c = this.crosshair,
          k = F(c.snap, !0),
          f, h = this.cross;
        e(this, "drawCrosshair", {
          e: a,
          point: d
        });
        a || (a = this.cross && this.cross.e);
        if (this.crosshair && !1 !== (z(d) || !k)) {
          k ? z(d) && (f = F(d.crosshairPos, this.isXAxis ? d.plotX : this.len - d.plotY)) : f = a && (this.horiz ? a.chartX - this.pos : this.len - a.chartY +
            this.pos);
          z(f) && (b = this.getPlotLinePath(d && (this.isXAxis ? d.x : F(d.stackY, d.y)), null, null, null, f) || null);
          if (!z(b)) {
            this.hideCrosshair();
            return
          }
          k = this.categories && !this.isRadial;
          h || (this.cross = h = this.chart.renderer.path().addClass("highcharts-crosshair highcharts-crosshair-" + (k ? "category " : "thin ") + c.className).attr({
            zIndex: F(c.zIndex, 2)
          }).add(), h.attr({
            stroke: c.color || (k ? m("#ccd6eb").setOpacity(.25).get() : "#cccccc"),
            "stroke-width": F(c.width, 1)
          }).css({
            "pointer-events": "none"
          }), c.dashStyle && h.attr({
            dashstyle: c.dashStyle
          }));
          h.show().attr({
            d: b
          });
          k && !c.width && h.attr({
            "stroke-width": this.transA
          });
          this.cross.e = a
        } else this.hideCrosshair();
        e(this, "afterDrawCrosshair", {
          e: a,
          point: d
        })
      },
      hideCrosshair: function() {
        this.cross && this.cross.hide()
      }
    });
    return a.Axis = E
  }(L);
  (function(a) {
    var B = a.Axis,
      C = a.getMagnitude,
      G = a.normalizeTickInterval,
      p = a.timeUnits;
    B.prototype.getTimeTicks = function() {
      return this.chart.time.getTimeTicks.apply(this.chart.time, arguments)
    };
    B.prototype.normalizeTimeTickInterval = function(a, g) {
      var m = g || [
        ["millisecond", [1,
          2, 5, 10, 20, 25, 50, 100, 200, 500
        ]],
        ["second", [1, 2, 5, 10, 15, 30]],
        ["minute", [1, 2, 5, 10, 15, 30]],
        ["hour", [1, 2, 3, 4, 6, 8, 12]],
        ["day", [1, 2]],
        ["week", [1, 2]],
        ["month", [1, 2, 3, 4, 6]],
        ["year", null]
      ];
      g = m[m.length - 1];
      var z = p[g[0]],
        u = g[1],
        y;
      for (y = 0; y < m.length && !(g = m[y], z = p[g[0]], u = g[1], m[y + 1] && a <= (z * u[u.length - 1] + p[m[y + 1][0]]) / 2); y++);
      z === p.year && a < 5 * z && (u = [1, 2, 5]);
      a = G(a / z, u, "year" === g[0] ? Math.max(C(a / z), 1) : 1);
      return {
        unitRange: z,
        count: a,
        unitName: g[0]
      }
    }
  })(L);
  (function(a) {
    var B = a.Axis,
      C = a.getMagnitude,
      G = a.map,
      p = a.normalizeTickInterval,
      m = a.pick;
    B.prototype.getLogTickPositions = function(a, v, z, u) {
      var g = this.options,
        l = this.len,
        b = [];
      u || (this._minorAutoInterval = null);
      if (.5 <= a) a = Math.round(a), b = this.getLinearTickPositions(a, v, z);
      else if (.08 <= a)
        for (var l = Math.floor(v), e, t, n, f, c, g = .3 < a ? [1, 2, 4] : .15 < a ? [1, 2, 4, 6, 8] : [1, 2, 3, 4, 5, 6, 7, 8, 9]; l < z + 1 && !c; l++)
          for (t = g.length, e = 0; e < t && !c; e++) n = this.log2lin(this.lin2log(l) * g[e]), n > v && (!u || f <= z) && void 0 !== f && b.push(f), f > z && (c = !0), f = n;
      else v = this.lin2log(v), z = this.lin2log(z), a = u ? this.getMinorTickInterval() :
        g.tickInterval, a = m("auto" === a ? null : a, this._minorAutoInterval, g.tickPixelInterval / (u ? 5 : 1) * (z - v) / ((u ? l / this.tickPositions.length : l) || 1)), a = p(a, null, C(a)), b = G(this.getLinearTickPositions(a, v, z), this.log2lin), u || (this._minorAutoInterval = a / 5);
      u || (this.tickInterval = a);
      return b
    };
    B.prototype.log2lin = function(a) {
      return Math.log(a) / Math.LN10
    };
    B.prototype.lin2log = function(a) {
      return Math.pow(10, a)
    }
  })(L);
  (function(a, B) {
    var C = a.arrayMax,
      G = a.arrayMin,
      p = a.defined,
      m = a.destroyObjectProperties,
      g = a.each,
      v = a.erase,
      z =
      a.merge,
      u = a.pick;
    a.PlotLineOrBand = function(a, l) {
      this.axis = a;
      l && (this.options = l, this.id = l.id)
    };
    a.PlotLineOrBand.prototype = {
      render: function() {
        var g = this,
          l = g.axis,
          b = l.horiz,
          e = g.options,
          t = e.label,
          n = g.label,
          f = e.to,
          c = e.from,
          h = e.value,
          w = p(c) && p(f),
          D = p(h),
          r = g.svgElem,
          J = !r,
          q = [],
          F = e.color,
          x = u(e.zIndex, 0),
          K = e.events,
          q = {
            "class": "highcharts-plot-" + (w ? "band " : "line ") + (e.className || "")
          },
          d = {},
          H = l.chart.renderer,
          E = w ? "bands" : "lines";
        l.isLog && (c = l.log2lin(c), f = l.log2lin(f), h = l.log2lin(h));
        D ? (q = {
            stroke: F,
            "stroke-width": e.width
          },
          e.dashStyle && (q.dashstyle = e.dashStyle)) : w && (F && (q.fill = F), e.borderWidth && (q.stroke = e.borderColor, q["stroke-width"] = e.borderWidth));
        d.zIndex = x;
        E += "-" + x;
        (F = l.plotLinesAndBandsGroups[E]) || (l.plotLinesAndBandsGroups[E] = F = H.g("plot-" + E).attr(d).add());
        J && (g.svgElem = r = H.path().attr(q).add(F));
        if (D) q = l.getPlotLinePath(h, r.strokeWidth());
        else if (w) q = l.getPlotBandPath(c, f, e);
        else return;
        J && q && q.length ? (r.attr({
          d: q
        }), K && a.objectEach(K, function(a, d) {
          r.on(d, function(a) {
            K[d].apply(g, [a])
          })
        })) : r && (q ? (r.show(),
          r.animate({
            d: q
          })) : (r.hide(), n && (g.label = n = n.destroy())));
        t && p(t.text) && q && q.length && 0 < l.width && 0 < l.height && !q.flat ? (t = z({
          align: b && w && "center",
          x: b ? !w && 4 : 10,
          verticalAlign: !b && w && "middle",
          y: b ? w ? 16 : 10 : w ? 6 : -4,
          rotation: b && !w && 90
        }, t), this.renderLabel(t, q, w, x)) : n && n.hide();
        return g
      },
      renderLabel: function(a, l, b, e) {
        var t = this.label,
          n = this.axis.chart.renderer;
        t || (t = {
            align: a.textAlign || a.align,
            rotation: a.rotation,
            "class": "highcharts-plot-" + (b ? "band" : "line") + "-label " + (a.className || "")
          }, t.zIndex = e, this.label = t =
          n.text(a.text, 0, 0, a.useHTML).attr(t).add(), t.css(a.style));
        e = l.xBounds || [l[1], l[4], b ? l[6] : l[1]];
        l = l.yBounds || [l[2], l[5], b ? l[7] : l[2]];
        b = G(e);
        n = G(l);
        t.align(a, !1, {
          x: b,
          y: n,
          width: C(e) - b,
          height: C(l) - n
        });
        t.show()
      },
      destroy: function() {
        v(this.axis.plotLinesAndBands, this);
        delete this.axis;
        m(this)
      }
    };
    a.extend(B.prototype, {
      getPlotBandPath: function(a, l) {
        var b = this.getPlotLinePath(l, null, null, !0),
          e = this.getPlotLinePath(a, null, null, !0),
          t = [],
          n = this.horiz,
          f = 1,
          c;
        a = a < this.min && l < this.min || a > this.max && l > this.max;
        if (e &&
          b)
          for (a && (c = e.toString() === b.toString(), f = 0), a = 0; a < e.length; a += 6) n && b[a + 1] === e[a + 1] ? (b[a + 1] += f, b[a + 4] += f) : n || b[a + 2] !== e[a + 2] || (b[a + 2] += f, b[a + 5] += f), t.push("M", e[a + 1], e[a + 2], "L", e[a + 4], e[a + 5], b[a + 4], b[a + 5], b[a + 1], b[a + 2], "z"), t.flat = c;
        return t
      },
      addPlotBand: function(a) {
        return this.addPlotBandOrLine(a, "plotBands")
      },
      addPlotLine: function(a) {
        return this.addPlotBandOrLine(a, "plotLines")
      },
      addPlotBandOrLine: function(g, l) {
        var b = (new a.PlotLineOrBand(this, g)).render(),
          e = this.userOptions;
        b && (l && (e[l] = e[l] || [],
          e[l].push(g)), this.plotLinesAndBands.push(b));
        return b
      },
      removePlotBandOrLine: function(a) {
        for (var l = this.plotLinesAndBands, b = this.options, e = this.userOptions, t = l.length; t--;) l[t].id === a && l[t].destroy();
        g([b.plotLines || [], e.plotLines || [], b.plotBands || [], e.plotBands || []], function(b) {
          for (t = b.length; t--;) b[t].id === a && v(b, b[t])
        })
      },
      removePlotBand: function(a) {
        this.removePlotBandOrLine(a)
      },
      removePlotLine: function(a) {
        this.removePlotBandOrLine(a)
      }
    })
  })(L, da);
  (function(a) {
    var B = a.each,
      C = a.extend,
      G = a.format,
      p = a.isNumber,
      m = a.map,
      g = a.merge,
      v = a.pick,
      z = a.splat,
      u = a.syncTimeout,
      y = a.timeUnits;
    a.Tooltip = function() {
      this.init.apply(this, arguments)
    };
    a.Tooltip.prototype = {
      init: function(a, b) {
        this.chart = a;
        this.options = b;
        this.crosshairs = [];
        this.now = {
          x: 0,
          y: 0
        };
        this.isHidden = !0;
        this.split = b.split && !a.inverted;
        this.shared = b.shared || this.split
      },
      cleanSplit: function(a) {
        B(this.chart.series, function(b) {
          var e = b && b.tt;
          e && (!e.isActive || a ? b.tt = e.destroy() : e.isActive = !1)
        })
      },
      getLabel: function() {
        var a = this.chart.renderer,
          b = this.options;
        this.label ||
          (this.split ? this.label = a.g("tooltip") : (this.label = a.label("", 0, 0, b.shape || "callout", null, null, b.useHTML, null, "tooltip").attr({
            padding: b.padding,
            r: b.borderRadius
          }), this.label.attr({
            fill: b.backgroundColor,
            "stroke-width": b.borderWidth
          }).css(b.style).shadow(b.shadow)), this.label.attr({
            zIndex: 8
          }).add());
        return this.label
      },
      update: function(a) {
        this.destroy();
        g(!0, this.chart.options.tooltip.userOptions, a);
        this.init(this.chart, g(!0, this.options, a))
      },
      destroy: function() {
        this.label && (this.label = this.label.destroy());
        this.split && this.tt && (this.cleanSplit(this.chart, !0), this.tt = this.tt.destroy());
        a.clearTimeout(this.hideTimer);
        a.clearTimeout(this.tooltipTimeout)
      },
      move: function(l, b, e, t) {
        var n = this,
          f = n.now,
          c = !1 !== n.options.animation && !n.isHidden && (1 < Math.abs(l - f.x) || 1 < Math.abs(b - f.y)),
          h = n.followPointer || 1 < n.len;
        C(f, {
          x: c ? (2 * f.x + l) / 3 : l,
          y: c ? (f.y + b) / 2 : b,
          anchorX: h ? void 0 : c ? (2 * f.anchorX + e) / 3 : e,
          anchorY: h ? void 0 : c ? (f.anchorY + t) / 2 : t
        });
        n.getLabel().attr(f);
        c && (a.clearTimeout(this.tooltipTimeout), this.tooltipTimeout = setTimeout(function() {
          n &&
            n.move(l, b, e, t)
        }, 32))
      },
      hide: function(l) {
        var b = this;
        a.clearTimeout(this.hideTimer);
        l = v(l, this.options.hideDelay, 500);
        this.isHidden || (this.hideTimer = u(function() {
          b.getLabel()[l ? "fadeOut" : "hide"]();
          b.isHidden = !0
        }, l))
      },
      getAnchor: function(a, b) {
        var e, l = this.chart,
          n = l.inverted,
          f = l.plotTop,
          c = l.plotLeft,
          h = 0,
          w = 0,
          D, r;
        a = z(a);
        e = a[0].tooltipPos;
        this.followPointer && b && (void 0 === b.chartX && (b = l.pointer.normalize(b)), e = [b.chartX - l.plotLeft, b.chartY - f]);
        e || (B(a, function(a) {
          D = a.series.yAxis;
          r = a.series.xAxis;
          h += a.plotX +
            (!n && r ? r.left - c : 0);
          w += (a.plotLow ? (a.plotLow + a.plotHigh) / 2 : a.plotY) + (!n && D ? D.top - f : 0)
        }), h /= a.length, w /= a.length, e = [n ? l.plotWidth - w : h, this.shared && !n && 1 < a.length && b ? b.chartY - f : n ? l.plotHeight - h : w]);
        return m(e, Math.round)
      },
      getPosition: function(a, b, e) {
        var l = this.chart,
          n = this.distance,
          f = {},
          c = l.inverted && e.h || 0,
          h, w = ["y", l.chartHeight, b, e.plotY + l.plotTop, l.plotTop, l.plotTop + l.plotHeight],
          D = ["x", l.chartWidth, a, e.plotX + l.plotLeft, l.plotLeft, l.plotLeft + l.plotWidth],
          r = !this.followPointer && v(e.ttBelow, !l.inverted ===
            !!e.negative),
          g = function(a, d, b, h, k, x) {
            var e = b < h - n,
              q = h + n + b < d,
              w = h - n - b;
            h += n;
            if (r && q) f[a] = h;
            else if (!r && e) f[a] = w;
            else if (e) f[a] = Math.min(x - b, 0 > w - c ? w : w - c);
            else if (q) f[a] = Math.max(k, h + c + b > d ? h : h + c);
            else return !1
          },
          q = function(a, d, b, c) {
            var k;
            c < n || c > d - n ? k = !1 : f[a] = c < b / 2 ? 1 : c > d - b / 2 ? d - b - 2 : c - b / 2;
            return k
          },
          F = function(a) {
            var d = w;
            w = D;
            D = d;
            h = a
          },
          x = function() {
            !1 !== g.apply(0, w) ? !1 !== q.apply(0, D) || h || (F(!0), x()) : h ? f.x = f.y = 0 : (F(!0), x())
          };
        (l.inverted || 1 < this.len) && F();
        x();
        return f
      },
      defaultFormatter: function(a) {
        var b = this.points ||
          z(this),
          e;
        e = [a.tooltipFooterHeaderFormatter(b[0])];
        e = e.concat(a.bodyFormatter(b));
        e.push(a.tooltipFooterHeaderFormatter(b[0], !0));
        return e
      },
      refresh: function(l, b) {
        var e, t = this.options,
          n, f = l,
          c, h = {},
          w = [];
        e = t.formatter || this.defaultFormatter;
        var h = this.shared,
          D;
        t.enabled && (a.clearTimeout(this.hideTimer), this.followPointer = z(f)[0].series.tooltipOptions.followPointer, c = this.getAnchor(f, b), b = c[0], n = c[1], !h || f.series && f.series.noSharedTooltip ? h = f.getLabelConfig() : (B(f, function(a) {
            a.setState("hover");
            w.push(a.getLabelConfig())
          }),
          h = {
            x: f[0].category,
            y: f[0].y
          }, h.points = w, f = f[0]), this.len = w.length, h = e.call(h, this), D = f.series, this.distance = v(D.tooltipOptions.distance, 16), !1 === h ? this.hide() : (e = this.getLabel(), this.isHidden && e.attr({
          opacity: 1
        }).show(), this.split ? this.renderSplit(h, z(l)) : (t.style.width || e.css({
          width: this.chart.spacingBox.width
        }), e.attr({
          text: h && h.join ? h.join("") : h
        }), e.removeClass(/highcharts-color-[\d]+/g).addClass("highcharts-color-" + v(f.colorIndex, D.colorIndex)), e.attr({
          stroke: t.borderColor || f.color || D.color ||
            "#666666"
        }), this.updatePosition({
          plotX: b,
          plotY: n,
          negative: f.negative,
          ttBelow: f.ttBelow,
          h: c[2] || 0
        })), this.isHidden = !1))
      },
      renderSplit: function(l, b) {
        var e = this,
          t = [],
          n = this.chart,
          f = n.renderer,
          c = !0,
          h = this.options,
          w = 0,
          D = this.getLabel();
        a.isString(l) && (l = [!1, l]);
        B(l.slice(0, b.length + 1), function(a, l) {
          if (!1 !== a) {
            l = b[l - 1] || {
              isHeader: !0,
              plotX: b[0].plotX
            };
            var r = l.series || e,
              F = r.tt,
              x = l.series || {},
              K = "highcharts-color-" + v(l.colorIndex, x.colorIndex, "none");
            F || (r.tt = F = f.label(null, null, null, "callout", null, null, h.useHTML).addClass("highcharts-tooltip-box " +
              K).attr({
              padding: h.padding,
              r: h.borderRadius,
              fill: h.backgroundColor,
              stroke: h.borderColor || l.color || x.color || "#333333",
              "stroke-width": h.borderWidth
            }).add(D));
            F.isActive = !0;
            F.attr({
              text: a
            });
            F.css(h.style).shadow(h.shadow);
            a = F.getBBox();
            x = a.width + F.strokeWidth();
            l.isHeader ? (w = a.height, x = Math.max(0, Math.min(l.plotX + n.plotLeft - x / 2, n.chartWidth - x))) : x = l.plotX + n.plotLeft - v(h.distance, 16) - x;
            0 > x && (c = !1);
            a = (l.series && l.series.yAxis && l.series.yAxis.pos) + (l.plotY || 0);
            a -= n.plotTop;
            t.push({
              target: l.isHeader ? n.plotHeight +
                w : a,
              rank: l.isHeader ? 1 : 0,
              size: r.tt.getBBox().height + 1,
              point: l,
              x: x,
              tt: F
            })
          }
        });
        this.cleanSplit();
        a.distribute(t, n.plotHeight + w);
        B(t, function(a) {
          var b = a.point,
            f = b.series;
          a.tt.attr({
            visibility: void 0 === a.pos ? "hidden" : "inherit",
            x: c || b.isHeader ? a.x : b.plotX + n.plotLeft + v(h.distance, 16),
            y: a.pos + n.plotTop,
            anchorX: b.isHeader ? b.plotX + n.plotLeft : b.plotX + f.xAxis.pos,
            anchorY: b.isHeader ? a.pos + n.plotTop - 15 : b.plotY + f.yAxis.pos
          })
        })
      },
      updatePosition: function(a) {
        var b = this.chart,
          e = this.getLabel(),
          e = (this.options.positioner ||
            this.getPosition).call(this, e.width, e.height, a);
        this.move(Math.round(e.x), Math.round(e.y || 0), a.plotX + b.plotLeft, a.plotY + b.plotTop)
      },
      getDateFormat: function(a, b, e, t) {
        var n = this.chart.time,
          f = n.dateFormat("%m-%d %H:%M:%S.%L", b),
          c, h, w = {
            millisecond: 15,
            second: 12,
            minute: 9,
            hour: 6,
            day: 3
          },
          l = "millisecond";
        for (h in y) {
          if (a === y.week && +n.dateFormat("%w", b) === e && "00:00:00.000" === f.substr(6)) {
            h = "week";
            break
          }
          if (y[h] > a) {
            h = l;
            break
          }
          if (w[h] && f.substr(w[h]) !== "01-01 00:00:00.000".substr(w[h])) break;
          "week" !== h && (l = h)
        }
        h &&
          (c = t[h]);
        return c
      },
      getXDateFormat: function(a, b, e) {
        b = b.dateTimeLabelFormats;
        var l = e && e.closestPointRange;
        return (l ? this.getDateFormat(l, a.x, e.options.startOfWeek, b) : b.day) || b.year
      },
      tooltipFooterHeaderFormatter: function(a, b) {
        b = b ? "footer" : "header";
        var e = a.series,
          l = e.tooltipOptions,
          n = l.xDateFormat,
          f = e.xAxis,
          c = f && "datetime" === f.options.type && p(a.key),
          h = l[b + "Format"];
        c && !n && (n = this.getXDateFormat(a, l, f));
        c && n && B(a.point && a.point.tooltipDateKeys || ["key"], function(a) {
          h = h.replace("{point." + a + "}", "{point." +
            a + ":" + n + "}")
        });
        return G(h, {
          point: a,
          series: e
        }, this.chart.time)
      },
      bodyFormatter: function(a) {
        return m(a, function(a) {
          var b = a.series.tooltipOptions;
          return (b[(a.point.formatPrefix || "point") + "Formatter"] || a.point.tooltipFormatter).call(a.point, b[(a.point.formatPrefix || "point") + "Format"])
        })
      }
    }
  })(L);
  (function(a) {
    var B = a.addEvent,
      C = a.attr,
      G = a.charts,
      p = a.color,
      m = a.css,
      g = a.defined,
      v = a.each,
      z = a.extend,
      u = a.find,
      y = a.fireEvent,
      l = a.isNumber,
      b = a.isObject,
      e = a.offset,
      t = a.pick,
      n = a.splat,
      f = a.Tooltip;
    a.Pointer = function(a,
      b) {
      this.init(a, b)
    };
    a.Pointer.prototype = {
      init: function(a, b) {
        this.options = b;
        this.chart = a;
        this.runChartClick = b.chart.events && !!b.chart.events.click;
        this.pinchDown = [];
        this.lastValidTouch = {};
        f && (a.tooltip = new f(a, b.tooltip), this.followTouchMove = t(b.tooltip.followTouchMove, !0));
        this.setDOMEvents()
      },
      zoomOption: function(a) {
        var b = this.chart,
          c = b.options.chart,
          f = c.zoomType || "",
          b = b.inverted;
        /touch/.test(a.type) && (f = t(c.pinchType, f));
        this.zoomX = a = /x/.test(f);
        this.zoomY = f = /y/.test(f);
        this.zoomHor = a && !b || f && b;
        this.zoomVert =
          f && !b || a && b;
        this.hasZoom = a || f
      },
      normalize: function(a, b) {
        var c;
        c = a.touches ? a.touches.length ? a.touches.item(0) : a.changedTouches[0] : a;
        b || (this.chartPosition = b = e(this.chart.container));
        return z(a, {
          chartX: Math.round(c.pageX - b.left),
          chartY: Math.round(c.pageY - b.top)
        })
      },
      getCoordinates: function(a) {
        var b = {
          xAxis: [],
          yAxis: []
        };
        v(this.chart.axes, function(c) {
          b[c.isXAxis ? "xAxis" : "yAxis"].push({
            axis: c,
            value: c.toValue(a[c.horiz ? "chartX" : "chartY"])
          })
        });
        return b
      },
      findNearestKDPoint: function(a, f, e) {
        var c;
        v(a, function(a) {
          var h = !(a.noSharedTooltip && f) && 0 > a.options.findNearestPointBy.indexOf("y");
          a = a.searchPoint(e, h);
          if ((h = b(a, !0)) && !(h = !b(c, !0))) var h = c.distX - a.distX,
            n = c.dist - a.dist,
            r = (a.series.group && a.series.group.zIndex) - (c.series.group && c.series.group.zIndex),
            h = 0 < (0 !== h && f ? h : 0 !== n ? n : 0 !== r ? r : c.series.index > a.series.index ? -1 : 1);
          h && (c = a)
        });
        return c
      },
      getPointFromEvent: function(a) {
        a = a.target;
        for (var b; a && !b;) b = a.point, a = a.parentNode;
        return b
      },
      getChartCoordinatesFromPoint: function(a, b) {
        var c = a.series,
          f = c.xAxis,
          c = c.yAxis,
          h =
          t(a.clientX, a.plotX),
          e = a.shapeArgs;
        if (f && c) return b ? {
          chartX: f.len + f.pos - h,
          chartY: c.len + c.pos - a.plotY
        } : {
          chartX: h + f.pos,
          chartY: a.plotY + c.pos
        };
        if (e && e.x && e.y) return {
          chartX: e.x,
          chartY: e.y
        }
      },
      getHoverData: function(c, f, e, n, r, l, q) {
        var h, x = [],
          w = q && q.isBoosting;
        n = !(!n || !c);
        q = f && !f.stickyTracking ? [f] : a.grep(e, function(a) {
          return a.visible && !(!r && a.directTouch) && t(a.options.enableMouseTracking, !0) && a.stickyTracking
        });
        f = (h = n ? c : this.findNearestKDPoint(q, r, l)) && h.series;
        h && (r && !f.noSharedTooltip ? (q = a.grep(e, function(a) {
          return a.visible &&
            !(!r && a.directTouch) && t(a.options.enableMouseTracking, !0) && !a.noSharedTooltip
        }), v(q, function(a) {
          var d = u(a.points, function(a) {
            return a.x === h.x && !a.isNull
          });
          b(d) && (w && (d = a.getPoint(d)), x.push(d))
        })) : x.push(h));
        return {
          hoverPoint: h,
          hoverSeries: f,
          hoverPoints: x
        }
      },
      runPointActions: function(b, f) {
        var c = this.chart,
          h = c.tooltip && c.tooltip.options.enabled ? c.tooltip : void 0,
          e = h ? h.shared : !1,
          n = f || c.hoverPoint,
          q = n && n.series || c.hoverSeries,
          q = this.getHoverData(n, q, c.series, !!f || q && q.directTouch && this.isDirectTouch, e,
            b, {
              isBoosting: c.isBoosting
            }),
          l, n = q.hoverPoint;
        l = q.hoverPoints;
        f = (q = q.hoverSeries) && q.tooltipOptions.followPointer;
        e = e && q && !q.noSharedTooltip;
        if (n && (n !== c.hoverPoint || h && h.isHidden)) {
          v(c.hoverPoints || [], function(b) {
            -1 === a.inArray(b, l) && b.setState()
          });
          v(l || [], function(a) {
            a.setState("hover")
          });
          if (c.hoverSeries !== q) q.onMouseOver();
          c.hoverPoint && c.hoverPoint.firePointEvent("mouseOut");
          if (!n.series) return;
          n.firePointEvent("mouseOver");
          c.hoverPoints = l;
          c.hoverPoint = n;
          h && h.refresh(e ? l : n, b)
        } else f && h && !h.isHidden &&
          (n = h.getAnchor([{}], b), h.updatePosition({
            plotX: n[0],
            plotY: n[1]
          }));
        this.unDocMouseMove || (this.unDocMouseMove = B(c.container.ownerDocument, "mousemove", function(b) {
          var c = G[a.hoverChartIndex];
          if (c) c.pointer.onDocumentMouseMove(b)
        }));
        v(c.axes, function(c) {
          var f = t(c.crosshair.snap, !0),
            d = f ? a.find(l, function(a) {
              return a.series[c.coll] === c
            }) : void 0;
          d || !f ? c.drawCrosshair(b, d) : c.hideCrosshair()
        })
      },
      reset: function(a, b) {
        var c = this.chart,
          f = c.hoverSeries,
          h = c.hoverPoint,
          e = c.hoverPoints,
          q = c.tooltip,
          l = q && q.shared ? e : h;
        a && l && v(n(l), function(b) {
          b.series.isCartesian && void 0 === b.plotX && (a = !1)
        });
        if (a) q && l && (q.refresh(l), h && (h.setState(h.state, !0), v(c.axes, function(a) {
          a.crosshair && a.drawCrosshair(null, h)
        })));
        else {
          if (h) h.onMouseOut();
          e && v(e, function(a) {
            a.setState()
          });
          if (f) f.onMouseOut();
          q && q.hide(b);
          this.unDocMouseMove && (this.unDocMouseMove = this.unDocMouseMove());
          v(c.axes, function(a) {
            a.hideCrosshair()
          });
          this.hoverX = c.hoverPoints = c.hoverPoint = null
        }
      },
      scaleGroups: function(a, b) {
        var c = this.chart,
          f;
        v(c.series, function(h) {
          f =
            a || h.getPlotBox();
          h.xAxis && h.xAxis.zoomEnabled && h.group && (h.group.attr(f), h.markerGroup && (h.markerGroup.attr(f), h.markerGroup.clip(b ? c.clipRect : null)), h.dataLabelsGroup && h.dataLabelsGroup.attr(f))
        });
        c.clipRect.attr(b || c.clipBox)
      },
      dragStart: function(a) {
        var b = this.chart;
        b.mouseIsDown = a.type;
        b.cancelClick = !1;
        b.mouseDownX = this.mouseDownX = a.chartX;
        b.mouseDownY = this.mouseDownY = a.chartY
      },
      drag: function(a) {
        var b = this.chart,
          c = b.options.chart,
          f = a.chartX,
          e = a.chartY,
          n = this.zoomHor,
          q = this.zoomVert,
          l = b.plotLeft,
          x = b.plotTop,
          t = b.plotWidth,
          d = b.plotHeight,
          H, E = this.selectionMarker,
          k = this.mouseDownX,
          A = this.mouseDownY,
          g = c.panKey && a[c.panKey + "Key"];
        E && E.touch || (f < l ? f = l : f > l + t && (f = l + t), e < x ? e = x : e > x + d && (e = x + d), this.hasDragged = Math.sqrt(Math.pow(k - f, 2) + Math.pow(A - e, 2)), 10 < this.hasDragged && (H = b.isInsidePlot(k - l, A - x), b.hasCartesianSeries && (this.zoomX || this.zoomY) && H && !g && !E && (this.selectionMarker = E = b.renderer.rect(l, x, n ? 1 : t, q ? 1 : d, 0).attr({
          fill: c.selectionMarkerFill || p("#335cad").setOpacity(.25).get(),
          "class": "highcharts-selection-marker",
          zIndex: 7
        }).add()), E && n && (f -= k, E.attr({
          width: Math.abs(f),
          x: (0 < f ? 0 : f) + k
        })), E && q && (f = e - A, E.attr({
          height: Math.abs(f),
          y: (0 < f ? 0 : f) + A
        })), H && !E && c.panning && b.pan(a, c.panning)))
      },
      drop: function(a) {
        var b = this,
          c = this.chart,
          f = this.hasPinched;
        if (this.selectionMarker) {
          var e = {
              originalEvent: a,
              xAxis: [],
              yAxis: []
            },
            n = this.selectionMarker,
            q = n.attr ? n.attr("x") : n.x,
            t = n.attr ? n.attr("y") : n.y,
            x = n.attr ? n.attr("width") : n.width,
            K = n.attr ? n.attr("height") : n.height,
            d;
          if (this.hasDragged || f) v(c.axes, function(c) {
            if (c.zoomEnabled && g(c.min) &&
              (f || b[{
                xAxis: "zoomX",
                yAxis: "zoomY"
              }[c.coll]])) {
              var h = c.horiz,
                k = "touchend" === a.type ? c.minPixelPadding : 0,
                n = c.toValue((h ? q : t) + k),
                h = c.toValue((h ? q + x : t + K) - k);
              e[c.coll].push({
                axis: c,
                min: Math.min(n, h),
                max: Math.max(n, h)
              });
              d = !0
            }
          }), d && y(c, "selection", e, function(a) {
            c.zoom(z(a, f ? {
              animation: !1
            } : null))
          });
          l(c.index) && (this.selectionMarker = this.selectionMarker.destroy());
          f && this.scaleGroups()
        }
        c && l(c.index) && (m(c.container, {
          cursor: c._cursor
        }), c.cancelClick = 10 < this.hasDragged, c.mouseIsDown = this.hasDragged = this.hasPinched = !1, this.pinchDown = [])
      },
      onContainerMouseDown: function(a) {
        a = this.normalize(a);
        2 !== a.button && (this.zoomOption(a), a.preventDefault && a.preventDefault(), this.dragStart(a))
      },
      onDocumentMouseUp: function(b) {
        G[a.hoverChartIndex] && G[a.hoverChartIndex].pointer.drop(b)
      },
      onDocumentMouseMove: function(a) {
        var b = this.chart,
          c = this.chartPosition;
        a = this.normalize(a, c);
        !c || this.inClass(a.target, "highcharts-tracker") || b.isInsidePlot(a.chartX - b.plotLeft, a.chartY - b.plotTop) || this.reset()
      },
      onContainerMouseLeave: function(b) {
        var c =
          G[a.hoverChartIndex];
        c && (b.relatedTarget || b.toElement) && (c.pointer.reset(), c.pointer.chartPosition = null)
      },
      onContainerMouseMove: function(b) {
        var c = this.chart;
        g(a.hoverChartIndex) && G[a.hoverChartIndex] && G[a.hoverChartIndex].mouseIsDown || (a.hoverChartIndex = c.index);
        b = this.normalize(b);
        b.returnValue = !1;
        "mousedown" === c.mouseIsDown && this.drag(b);
        !this.inClass(b.target, "highcharts-tracker") && !c.isInsidePlot(b.chartX - c.plotLeft, b.chartY - c.plotTop) || c.openMenu || this.runPointActions(b)
      },
      inClass: function(a, b) {
        for (var c; a;) {
          if (c =
            C(a, "class")) {
            if (-1 !== c.indexOf(b)) return !0;
            if (-1 !== c.indexOf("highcharts-container")) return !1
          }
          a = a.parentNode
        }
      },
      onTrackerMouseOut: function(a) {
        var b = this.chart.hoverSeries;
        a = a.relatedTarget || a.toElement;
        this.isDirectTouch = !1;
        if (!(!b || !a || b.stickyTracking || this.inClass(a, "highcharts-tooltip") || this.inClass(a, "highcharts-series-" + b.index) && this.inClass(a, "highcharts-tracker"))) b.onMouseOut()
      },
      onContainerClick: function(a) {
        var b = this.chart,
          f = b.hoverPoint,
          c = b.plotLeft,
          e = b.plotTop;
        a = this.normalize(a);
        b.cancelClick ||
          (f && this.inClass(a.target, "highcharts-tracker") ? (y(f.series, "click", z(a, {
            point: f
          })), b.hoverPoint && f.firePointEvent("click", a)) : (z(a, this.getCoordinates(a)), b.isInsidePlot(a.chartX - c, a.chartY - e) && y(b, "click", a)))
      },
      setDOMEvents: function() {
        var b = this,
          f = b.chart.container,
          e = f.ownerDocument;
        f.onmousedown = function(a) {
          b.onContainerMouseDown(a)
        };
        f.onmousemove = function(a) {
          b.onContainerMouseMove(a)
        };
        f.onclick = function(a) {
          b.onContainerClick(a)
        };
        this.unbindContainerMouseLeave = B(f, "mouseleave", b.onContainerMouseLeave);
        a.unbindDocumentMouseUp || (a.unbindDocumentMouseUp = B(e, "mouseup", b.onDocumentMouseUp));
        a.hasTouch && (f.ontouchstart = function(a) {
          b.onContainerTouchStart(a)
        }, f.ontouchmove = function(a) {
          b.onContainerTouchMove(a)
        }, a.unbindDocumentTouchEnd || (a.unbindDocumentTouchEnd = B(e, "touchend", b.onDocumentTouchEnd)))
      },
      destroy: function() {
        var b = this;
        b.unDocMouseMove && b.unDocMouseMove();
        this.unbindContainerMouseLeave();
        a.chartCount || (a.unbindDocumentMouseUp && (a.unbindDocumentMouseUp = a.unbindDocumentMouseUp()), a.unbindDocumentTouchEnd &&
          (a.unbindDocumentTouchEnd = a.unbindDocumentTouchEnd()));
        clearInterval(b.tooltipTimeout);
        a.objectEach(b, function(a, f) {
          b[f] = null
        })
      }
    }
  })(L);
  (function(a) {
    var B = a.charts,
      C = a.each,
      G = a.extend,
      p = a.map,
      m = a.noop,
      g = a.pick;
    G(a.Pointer.prototype, {
      pinchTranslate: function(a, g, m, p, l, b) {
        this.zoomHor && this.pinchTranslateDirection(!0, a, g, m, p, l, b);
        this.zoomVert && this.pinchTranslateDirection(!1, a, g, m, p, l, b)
      },
      pinchTranslateDirection: function(a, g, m, p, l, b, e, t) {
        var n = this.chart,
          f = a ? "x" : "y",
          c = a ? "X" : "Y",
          h = "chart" + c,
          w = a ? "width" :
          "height",
          D = n["plot" + (a ? "Left" : "Top")],
          r, J, q = t || 1,
          F = n.inverted,
          x = n.bounds[a ? "h" : "v"],
          K = 1 === g.length,
          d = g[0][h],
          H = m[0][h],
          E = !K && g[1][h],
          k = !K && m[1][h],
          A;
        m = function() {
          !K && 20 < Math.abs(d - E) && (q = t || Math.abs(H - k) / Math.abs(d - E));
          J = (D - H) / q + d;
          r = n["plot" + (a ? "Width" : "Height")] / q
        };
        m();
        g = J;
        g < x.min ? (g = x.min, A = !0) : g + r > x.max && (g = x.max - r, A = !0);
        A ? (H -= .8 * (H - e[f][0]), K || (k -= .8 * (k - e[f][1])), m()) : e[f] = [H, k];
        F || (b[f] = J - D, b[w] = r);
        b = F ? 1 / q : q;
        l[w] = r;
        l[f] = g;
        p[F ? a ? "scaleY" : "scaleX" : "scale" + c] = q;
        p["translate" + c] = b * D + (H - b * d)
      },
      pinch: function(a) {
        var v =
          this,
          u = v.chart,
          y = v.pinchDown,
          l = a.touches,
          b = l.length,
          e = v.lastValidTouch,
          t = v.hasZoom,
          n = v.selectionMarker,
          f = {},
          c = 1 === b && (v.inClass(a.target, "highcharts-tracker") && u.runTrackerClick || v.runChartClick),
          h = {};
        1 < b && (v.initiated = !0);
        t && v.initiated && !c && a.preventDefault();
        p(l, function(a) {
          return v.normalize(a)
        });
        "touchstart" === a.type ? (C(l, function(a, b) {
          y[b] = {
            chartX: a.chartX,
            chartY: a.chartY
          }
        }), e.x = [y[0].chartX, y[1] && y[1].chartX], e.y = [y[0].chartY, y[1] && y[1].chartY], C(u.axes, function(a) {
          if (a.zoomEnabled) {
            var b =
              u.bounds[a.horiz ? "h" : "v"],
              f = a.minPixelPadding,
              c = a.toPixels(g(a.options.min, a.dataMin)),
              h = a.toPixels(g(a.options.max, a.dataMax)),
              e = Math.max(c, h);
            b.min = Math.min(a.pos, Math.min(c, h) - f);
            b.max = Math.max(a.pos + a.len, e + f)
          }
        }), v.res = !0) : v.followTouchMove && 1 === b ? this.runPointActions(v.normalize(a)) : y.length && (n || (v.selectionMarker = n = G({
          destroy: m,
          touch: !0
        }, u.plotBox)), v.pinchTranslate(y, l, f, n, h, e), v.hasPinched = t, v.scaleGroups(f, h), v.res && (v.res = !1, this.reset(!1, 0)))
      },
      touch: function(m, p) {
        var u = this.chart,
          v, l;
        if (u.index !== a.hoverChartIndex) this.onContainerMouseLeave({
          relatedTarget: !0
        });
        a.hoverChartIndex = u.index;
        1 === m.touches.length ? (m = this.normalize(m), (l = u.isInsidePlot(m.chartX - u.plotLeft, m.chartY - u.plotTop)) && !u.openMenu ? (p && this.runPointActions(m), "touchmove" === m.type && (p = this.pinchDown, v = p[0] ? 4 <= Math.sqrt(Math.pow(p[0].chartX - m.chartX, 2) + Math.pow(p[0].chartY - m.chartY, 2)) : !1), g(v, !0) && this.pinch(m)) : p && this.reset()) : 2 === m.touches.length && this.pinch(m)
      },
      onContainerTouchStart: function(a) {
        this.zoomOption(a);
        this.touch(a, !0)
      },
      onContainerTouchMove: function(a) {
        this.touch(a)
      },
      onDocumentTouchEnd: function(g) {
        B[a.hoverChartIndex] && B[a.hoverChartIndex].pointer.drop(g)
      }
    })
  })(L);
  (function(a) {
    var B = a.addEvent,
      C = a.charts,
      G = a.css,
      p = a.doc,
      m = a.extend,
      g = a.noop,
      v = a.Pointer,
      z = a.removeEvent,
      u = a.win,
      y = a.wrap;
    if (!a.hasTouch && (u.PointerEvent || u.MSPointerEvent)) {
      var l = {},
        b = !!u.PointerEvent,
        e = function() {
          var b = [];
          b.item = function(a) {
            return this[a]
          };
          a.objectEach(l, function(a) {
            b.push({
              pageX: a.pageX,
              pageY: a.pageY,
              target: a.target
            })
          });
          return b
        },
        t = function(b, f, c, h) {
          "touch" !== b.pointerType && b.pointerType !== b.MSPOINTER_TYPE_TOUCH || !C[a.hoverChartIndex] || (h(b), h = C[a.hoverChartIndex].pointer, h[f]({
            type: c,
            target: b.currentTarget,
            preventDefault: g,
            touches: e()
          }))
        };
      m(v.prototype, {
        onContainerPointerDown: function(a) {
          t(a, "onContainerTouchStart", "touchstart", function(a) {
            l[a.pointerId] = {
              pageX: a.pageX,
              pageY: a.pageY,
              target: a.currentTarget
            }
          })
        },
        onContainerPointerMove: function(a) {
          t(a, "onContainerTouchMove", "touchmove", function(a) {
            l[a.pointerId] = {
              pageX: a.pageX,
              pageY: a.pageY
            };
            l[a.pointerId].target || (l[a.pointerId].target = a.currentTarget)
          })
        },
        onDocumentPointerUp: function(a) {
          t(a, "onDocumentTouchEnd", "touchend", function(a) {
            delete l[a.pointerId]
          })
        },
        batchMSEvents: function(a) {
          a(this.chart.container, b ? "pointerdown" : "MSPointerDown", this.onContainerPointerDown);
          a(this.chart.container, b ? "pointermove" : "MSPointerMove", this.onContainerPointerMove);
          a(p, b ? "pointerup" : "MSPointerUp", this.onDocumentPointerUp)
        }
      });
      y(v.prototype, "init", function(a, b, c) {
        a.call(this, b, c);
        this.hasZoom &&
          G(b.container, {
            "-ms-touch-action": "none",
            "touch-action": "none"
          })
      });
      y(v.prototype, "setDOMEvents", function(a) {
        a.apply(this);
        (this.hasZoom || this.followTouchMove) && this.batchMSEvents(B)
      });
      y(v.prototype, "destroy", function(a) {
        this.batchMSEvents(z);
        a.call(this)
      })
    }
  })(L);
  (function(a) {
    var B = a.addEvent,
      C = a.css,
      G = a.discardElement,
      p = a.defined,
      m = a.each,
      g = a.fireEvent,
      v = a.isFirefox,
      z = a.marginNames,
      u = a.merge,
      y = a.pick,
      l = a.setAnimation,
      b = a.stableSort,
      e = a.win,
      t = a.wrap;
    a.Legend = function(a, b) {
      this.init(a, b)
    };
    a.Legend.prototype = {
      init: function(a, b) {
        this.chart = a;
        this.setOptions(b);
        b.enabled && (this.render(), B(this.chart, "endResize", function() {
          this.legend.positionCheckboxes()
        }))
      },
      setOptions: function(a) {
        var b = y(a.padding, 8);
        this.options = a;
        this.itemStyle = a.itemStyle;
        this.itemHiddenStyle = u(this.itemStyle, a.itemHiddenStyle);
        this.itemMarginTop = a.itemMarginTop || 0;
        this.padding = b;
        this.initialItemY = b - 5;
        this.symbolWidth = y(a.symbolWidth, 16);
        this.pages = []
      },
      update: function(a, b) {
        var f = this.chart;
        this.setOptions(u(!0, this.options, a));
        this.destroy();
        f.isDirtyLegend = f.isDirtyBox = !0;
        y(b, !0) && f.redraw();
        g(this, "afterUpdate")
      },
      colorizeItem: function(a, b) {
        a.legendGroup[b ? "removeClass" : "addClass"]("highcharts-legend-item-hidden");
        var f = this.options,
          h = a.legendItem,
          e = a.legendLine,
          n = a.legendSymbol,
          l = this.itemHiddenStyle.color,
          f = b ? f.itemStyle.color : l,
          t = b ? a.color || l : l,
          q = a.options && a.options.marker,
          F = {
            fill: t
          };
        h && h.css({
          fill: f,
          color: f
        });
        e && e.attr({
          stroke: t
        });
        n && (q && n.isMarker && (F = a.pointAttribs(), b || (F.stroke = F.fill = l)), n.attr(F));
        g(this, "afterColorizeItem", {
          item: a,
          visible: b
        })
      },
      positionItem: function(a) {
        var b = this.options,
          c = b.symbolPadding,
          b = !b.rtl,
          h = a._legendItemPos,
          e = h[0],
          h = h[1],
          n = a.checkbox;
        (a = a.legendGroup) && a.element && a.translate(b ? e : this.legendWidth - e - 2 * c - 4, h);
        n && (n.x = e, n.y = h)
      },
      destroyItem: function(a) {
        var b = a.checkbox;
        m(["legendItem", "legendLine", "legendSymbol", "legendGroup"], function(b) {
          a[b] && (a[b] = a[b].destroy())
        });
        b && G(a.checkbox)
      },
      destroy: function() {
        function a(a) {
          this[a] && (this[a] = this[a].destroy())
        }
        m(this.getAllItems(), function(b) {
          m(["legendItem",
            "legendGroup"
          ], a, b)
        });
        m("clipRect up down pager nav box title group".split(" "), a, this);
        this.display = null
      },
      positionCheckboxes: function() {
        var a = this.group && this.group.alignAttr,
          b, c = this.clipHeight || this.legendHeight,
          h = this.titleHeight;
        a && (b = a.translateY, m(this.allItems, function(f) {
          var e = f.checkbox,
            n;
          e && (n = b + h + e.y + (this.scrollOffset || 0) + 3, C(e, {
            left: a.translateX + f.checkboxOffset + e.x - 20 + "px",
            top: n + "px",
            display: n > b - 6 && n < b + c - 6 ? "" : "none"
          }))
        }, this))
      },
      renderTitle: function() {
        var a = this.options,
          b = this.padding,
          c = a.title,
          h = 0;
        c.text && (this.title || (this.title = this.chart.renderer.label(c.text, b - 3, b - 4, null, null, null, a.useHTML, null, "legend-title").attr({
          zIndex: 1
        }).css(c.style).add(this.group)), a = this.title.getBBox(), h = a.height, this.offsetWidth = a.width, this.contentGroup.attr({
          translateY: h
        }));
        this.titleHeight = h
      },
      setText: function(b) {
        var f = this.options;
        b.legendItem.attr({
          text: f.labelFormat ? a.format(f.labelFormat, b, this.chart.time) : f.labelFormatter.call(b)
        })
      },
      renderItem: function(a) {
        var b = this.chart,
          c = b.renderer,
          h =
          this.options,
          e = this.symbolWidth,
          l = h.symbolPadding,
          n = this.itemStyle,
          t = this.itemHiddenStyle,
          q = "horizontal" === h.layout ? y(h.itemDistance, 20) : 0,
          g = !h.rtl,
          x = a.legendItem,
          K = !a.series,
          d = !K && a.series.drawLegendSymbol ? a.series : a,
          H = d.options,
          H = this.createCheckboxForItem && H && H.showCheckbox,
          q = e + l + q + (H ? 20 : 0),
          E = h.useHTML,
          k = a.options.className;
        x || (a.legendGroup = c.g("legend-item").addClass("highcharts-" + d.type + "-series highcharts-color-" + a.colorIndex + (k ? " " + k : "") + (K ? " highcharts-series-" + a.index : "")).attr({
            zIndex: 1
          }).add(this.scrollGroup),
          a.legendItem = x = c.text("", g ? e + l : -l, this.baseline || 0, E).css(u(a.visible ? n : t)).attr({
            align: g ? "left" : "right",
            zIndex: 2
          }).add(a.legendGroup), this.baseline || (e = n.fontSize, this.fontMetrics = c.fontMetrics(e, x), this.baseline = this.fontMetrics.f + 3 + this.itemMarginTop, x.attr("y", this.baseline)), this.symbolHeight = h.symbolHeight || this.fontMetrics.f, d.drawLegendSymbol(this, a), this.setItemEvents && this.setItemEvents(a, x, E), H && this.createCheckboxForItem(a));
        this.colorizeItem(a, a.visible);
        n.width || x.css({
          width: (h.itemWidth ||
            h.width || b.spacingBox.width) - q
        });
        this.setText(a);
        b = x.getBBox();
        a.itemWidth = a.checkboxOffset = h.itemWidth || a.legendItemWidth || b.width + q;
        this.maxItemWidth = Math.max(this.maxItemWidth, a.itemWidth);
        this.totalItemWidth += a.itemWidth;
        this.itemHeight = a.itemHeight = Math.round(a.legendItemHeight || b.height || this.symbolHeight)
      },
      layoutItem: function(a) {
        var b = this.options,
          c = this.padding,
          h = "horizontal" === b.layout,
          e = a.itemHeight,
          l = b.itemMarginBottom || 0,
          n = this.itemMarginTop,
          t = h ? y(b.itemDistance, 20) : 0,
          q = b.width,
          g = q || this.chart.spacingBox.width -
          2 * c - b.x,
          b = b.alignColumns && this.totalItemWidth > g ? this.maxItemWidth : a.itemWidth;
        h && this.itemX - c + b > g && (this.itemX = c, this.itemY += n + this.lastLineHeight + l, this.lastLineHeight = 0);
        this.lastItemY = n + this.itemY + l;
        this.lastLineHeight = Math.max(e, this.lastLineHeight);
        a._legendItemPos = [this.itemX, this.itemY];
        h ? this.itemX += b : (this.itemY += n + e + l, this.lastLineHeight = e);
        this.offsetWidth = q || Math.max((h ? this.itemX - c - (a.checkbox ? 0 : t) : b) + c, this.offsetWidth)
      },
      getAllItems: function() {
        var a = [];
        m(this.chart.series, function(b) {
          var c =
            b && b.options;
          b && y(c.showInLegend, p(c.linkedTo) ? !1 : void 0, !0) && (a = a.concat(b.legendItems || ("point" === c.legendType ? b.data : b)))
        });
        g(this, "afterGetAllItems", {
          allItems: a
        });
        return a
      },
      getAlignment: function() {
        var a = this.options;
        return a.floating ? "" : a.align.charAt(0) + a.verticalAlign.charAt(0) + a.layout.charAt(0)
      },
      adjustMargins: function(a, b) {
        var c = this.chart,
          f = this.options,
          e = this.getAlignment();
        e && m([/(lth|ct|rth)/, /(rtv|rm|rbv)/, /(rbh|cb|lbh)/, /(lbv|lm|ltv)/], function(h, l) {
          h.test(e) && !p(a[l]) && (c[z[l]] = Math.max(c[z[l]],
            c.legend[(l + 1) % 2 ? "legendHeight" : "legendWidth"] + [1, -1, -1, 1][l] * f[l % 2 ? "x" : "y"] + y(f.margin, 12) + b[l] + (0 === l && void 0 !== c.options.title.margin ? c.titleOffset + c.options.title.margin : 0)))
        })
      },
      render: function() {
        var a = this.chart,
          f = a.renderer,
          c = this.group,
          e, l, t, r, g = this.box,
          q = this.options,
          F = this.padding;
        this.itemX = F;
        this.itemY = this.initialItemY;
        this.lastItemY = this.offsetWidth = 0;
        c || (this.group = c = f.g("legend").attr({
          zIndex: 7
        }).add(), this.contentGroup = f.g().attr({
          zIndex: 1
        }).add(c), this.scrollGroup = f.g().add(this.contentGroup));
        this.renderTitle();
        e = this.getAllItems();
        b(e, function(a, b) {
          return (a.options && a.options.legendIndex || 0) - (b.options && b.options.legendIndex || 0)
        });
        q.reversed && e.reverse();
        this.allItems = e;
        this.display = l = !!e.length;
        this.itemHeight = this.totalItemWidth = this.maxItemWidth = this.lastLineHeight = 0;
        m(e, this.renderItem, this);
        m(e, this.layoutItem, this);
        t = (q.width || this.offsetWidth) + F;
        r = this.lastItemY + this.lastLineHeight + this.titleHeight;
        r = this.handleOverflow(r);
        r += F;
        g || (this.box = g = f.rect().addClass("highcharts-legend-box").attr({
            r: q.borderRadius
          }).add(c),
          g.isNew = !0);
        g.attr({
          stroke: q.borderColor,
          "stroke-width": q.borderWidth || 0,
          fill: q.backgroundColor || "none"
        }).shadow(q.shadow);
        0 < t && 0 < r && (g[g.isNew ? "attr" : "animate"](g.crisp.call({}, {
          x: 0,
          y: 0,
          width: t,
          height: r
        }, g.strokeWidth())), g.isNew = !1);
        g[l ? "show" : "hide"]();
        this.legendWidth = t;
        this.legendHeight = r;
        m(e, this.positionItem, this);
        l && (f = a.spacingBox, /(lth|ct|rth)/.test(this.getAlignment()) && (f = u(f, {
          y: f.y + a.titleOffset + a.options.title.margin
        })), c.align(u(q, {
          width: t,
          height: r
        }), !0, f));
        a.isResizing || this.positionCheckboxes()
      },
      handleOverflow: function(a) {
        var b = this,
          c = this.chart,
          e = c.renderer,
          l = this.options,
          n = l.y,
          r = this.padding,
          c = c.spacingBox.height + ("top" === l.verticalAlign ? -n : n) - r,
          n = l.maxHeight,
          t, q = this.clipRect,
          g = l.navigation,
          x = y(g.animation, !0),
          K = g.arrowSize || 12,
          d = this.nav,
          H = this.pages,
          E, k = this.allItems,
          A = function(a) {
            "number" === typeof a ? q.attr({
              height: a
            }) : q && (b.clipRect = q.destroy(), b.contentGroup.clip());
            b.contentGroup.div && (b.contentGroup.div.style.clip = a ? "rect(" + r + "px,9999px," + (r + a) + "px,0)" : "auto")
          };
        "horizontal" !== l.layout ||
          "middle" === l.verticalAlign || l.floating || (c /= 2);
        n && (c = Math.min(c, n));
        H.length = 0;
        a > c && !1 !== g.enabled ? (this.clipHeight = t = Math.max(c - 20 - this.titleHeight - r, 0), this.currentPage = y(this.currentPage, 1), this.fullHeight = a, m(k, function(a, b) {
          var d = a._legendItemPos[1],
            c = Math.round(a.legendItem.getBBox().height),
            f = H.length;
          if (!f || d - H[f - 1] > t && (E || d) !== H[f - 1]) H.push(E || d), f++;
          a.pageIx = f - 1;
          E && (k[b - 1].pageIx = f - 1);
          b === k.length - 1 && d + c - H[f - 1] > t && (H.push(d), a.pageIx = f);
          d !== E && (E = d)
        }), q || (q = b.clipRect = e.clipRect(0, r, 9999,
          0), b.contentGroup.clip(q)), A(t), d || (this.nav = d = e.g().attr({
          zIndex: 1
        }).add(this.group), this.up = e.symbol("triangle", 0, 0, K, K).on("click", function() {
          b.scroll(-1, x)
        }).add(d), this.pager = e.text("", 15, 10).addClass("highcharts-legend-navigation").css(g.style).add(d), this.down = e.symbol("triangle-down", 0, 0, K, K).on("click", function() {
          b.scroll(1, x)
        }).add(d)), b.scroll(0), a = c) : d && (A(), this.nav = d.destroy(), this.scrollGroup.attr({
          translateY: 1
        }), this.clipHeight = 0);
        return a
      },
      scroll: function(a, b) {
        var c = this.pages,
          f =
          c.length;
        a = this.currentPage + a;
        var e = this.clipHeight,
          n = this.options.navigation,
          r = this.pager,
          t = this.padding;
        a > f && (a = f);
        0 < a && (void 0 !== b && l(b, this.chart), this.nav.attr({
          translateX: t,
          translateY: e + this.padding + 7 + this.titleHeight,
          visibility: "visible"
        }), this.up.attr({
          "class": 1 === a ? "highcharts-legend-nav-inactive" : "highcharts-legend-nav-active"
        }), r.attr({
          text: a + "/" + f
        }), this.down.attr({
          x: 18 + this.pager.getBBox().width,
          "class": a === f ? "highcharts-legend-nav-inactive" : "highcharts-legend-nav-active"
        }), this.up.attr({
          fill: 1 ===
            a ? n.inactiveColor : n.activeColor
        }).css({
          cursor: 1 === a ? "default" : "pointer"
        }), this.down.attr({
          fill: a === f ? n.inactiveColor : n.activeColor
        }).css({
          cursor: a === f ? "default" : "pointer"
        }), this.scrollOffset = -c[a - 1] + this.initialItemY, this.scrollGroup.animate({
          translateY: this.scrollOffset
        }), this.currentPage = a, this.positionCheckboxes())
      }
    };
    a.LegendSymbolMixin = {
      drawRectangle: function(a, b) {
        var c = a.symbolHeight,
          f = a.options.squareSymbol;
        b.legendSymbol = this.chart.renderer.rect(f ? (a.symbolWidth - c) / 2 : 0, a.baseline - c + 1, f ? c : a.symbolWidth,
          c, y(a.options.symbolRadius, c / 2)).addClass("highcharts-point").attr({
          zIndex: 3
        }).add(b.legendGroup)
      },
      drawLineMarker: function(a) {
        var b = this.options,
          c = b.marker,
          e = a.symbolWidth,
          l = a.symbolHeight,
          n = l / 2,
          r = this.chart.renderer,
          t = this.legendGroup;
        a = a.baseline - Math.round(.3 * a.fontMetrics.b);
        var q;
        q = {
          "stroke-width": b.lineWidth || 0
        };
        b.dashStyle && (q.dashstyle = b.dashStyle);
        this.legendLine = r.path(["M", 0, a, "L", e, a]).addClass("highcharts-graph").attr(q).add(t);
        c && !1 !== c.enabled && (b = Math.min(y(c.radius, n), n), 0 === this.symbol.indexOf("url") &&
          (c = u(c, {
            width: l,
            height: l
          }), b = 0), this.legendSymbol = c = r.symbol(this.symbol, e / 2 - b, a - b, 2 * b, 2 * b, c).addClass("highcharts-point").add(t), c.isMarker = !0)
      }
    };
    (/Trident\/7\.0/.test(e.navigator.userAgent) || v) && t(a.Legend.prototype, "positionItem", function(a, b) {
      var c = this,
        f = function() {
          b._legendItemPos && a.call(c, b)
        };
      f();
      setTimeout(f)
    })
  })(L);
  (function(a) {
    var B = a.addEvent,
      C = a.animate,
      G = a.animObject,
      p = a.attr,
      m = a.doc,
      g = a.Axis,
      v = a.createElement,
      z = a.defaultOptions,
      u = a.discardElement,
      y = a.charts,
      l = a.css,
      b = a.defined,
      e = a.each,
      t = a.extend,
      n = a.find,
      f = a.fireEvent,
      c = a.grep,
      h = a.isNumber,
      w = a.isObject,
      D = a.isString,
      r = a.Legend,
      J = a.marginNames,
      q = a.merge,
      F = a.objectEach,
      x = a.Pointer,
      K = a.pick,
      d = a.pInt,
      H = a.removeEvent,
      E = a.seriesTypes,
      k = a.splat,
      A = a.syncTimeout,
      P = a.win,
      R = a.Chart = function() {
        this.getArgs.apply(this, arguments)
      };
    a.chart = function(a, b, d) {
      return new R(a, b, d)
    };
    t(R.prototype, {
      callbacks: [],
      getArgs: function() {
        var a = [].slice.call(arguments);
        if (D(a[0]) || a[0].nodeName) this.renderTo = a.shift();
        this.init(a[0], a[1])
      },
      init: function(b, d) {
        var k,
          c, e = b.series,
          h = b.plotOptions || {};
        f(this, "init", {
          args: arguments
        }, function() {
          b.series = null;
          k = q(z, b);
          for (c in k.plotOptions) k.plotOptions[c].tooltip = h[c] && q(h[c].tooltip) || void 0;
          k.tooltip.userOptions = b.chart && b.chart.forExport && b.tooltip.userOptions || b.tooltip;
          k.series = b.series = e;
          this.userOptions = b;
          var x = k.chart,
            l = x.events;
          this.margin = [];
          this.spacing = [];
          this.bounds = {
            h: {},
            v: {}
          };
          this.labelCollectors = [];
          this.callback = d;
          this.isResizing = 0;
          this.options = k;
          this.axes = [];
          this.series = [];
          this.time = b.time && a.keys(b.time).length ?
            new a.Time(b.time) : a.time;
          this.hasCartesianSeries = x.showAxes;
          var E = this;
          E.index = y.length;
          y.push(E);
          a.chartCount++;
          l && F(l, function(a, b) {
            B(E, b, a)
          });
          E.xAxis = [];
          E.yAxis = [];
          E.pointCount = E.colorCounter = E.symbolCounter = 0;
          f(E, "afterInit");
          E.firstRender()
        })
      },
      initSeries: function(b) {
        var d = this.options.chart;
        (d = E[b.type || d.type || d.defaultSeriesType]) || a.error(17, !0);
        d = new d;
        d.init(this, b);
        return d
      },
      orderSeries: function(a) {
        var b = this.series;
        for (a = a || 0; a < b.length; a++) b[a] && (b[a].index = a, b[a].name = b[a].getName())
      },
      isInsidePlot: function(a, b, d) {
        var k = d ? b : a;
        a = d ? a : b;
        return 0 <= k && k <= this.plotWidth && 0 <= a && a <= this.plotHeight
      },
      redraw: function(b) {
        f(this, "beforeRedraw");
        var d = this.axes,
          k = this.series,
          c = this.pointer,
          h = this.legend,
          x = this.isDirtyLegend,
          l, q, E = this.hasCartesianSeries,
          r = this.isDirtyBox,
          n, H = this.renderer,
          g = H.isHidden(),
          A = [];
        this.setResponsive && this.setResponsive(!1);
        a.setAnimation(b, this);
        g && this.temporaryDisplay();
        this.layOutTitles();
        for (b = k.length; b--;)
          if (n = k[b], n.options.stacking && (l = !0, n.isDirty)) {
            q = !0;
            break
          }
        if (q)
          for (b = k.length; b--;) n = k[b], n.options.stacking && (n.isDirty = !0);
        e(k, function(a) {
          a.isDirty && "point" === a.options.legendType && (a.updateTotals && a.updateTotals(), x = !0);
          a.isDirtyData && f(a, "updatedData")
        });
        x && h.options.enabled && (h.render(), this.isDirtyLegend = !1);
        l && this.getStacks();
        E && e(d, function(a) {
          a.updateNames();
          a.setScale()
        });
        this.getMargins();
        E && (e(d, function(a) {
          a.isDirty && (r = !0)
        }), e(d, function(a) {
          var b = a.min + "," + a.max;
          a.extKey !== b && (a.extKey = b, A.push(function() {
            f(a, "afterSetExtremes", t(a.eventArgs,
              a.getExtremes()));
            delete a.eventArgs
          }));
          (r || l) && a.redraw()
        }));
        r && this.drawChartBox();
        f(this, "predraw");
        e(k, function(a) {
          (r || a.isDirty) && a.visible && a.redraw();
          a.isDirtyData = !1
        });
        c && c.reset(!0);
        H.draw();
        f(this, "redraw");
        f(this, "render");
        g && this.temporaryDisplay(!0);
        e(A, function(a) {
          a.call()
        })
      },
      get: function(a) {
        function b(b) {
          return b.id === a || b.options && b.options.id === a
        }
        var d, k = this.series,
          c;
        d = n(this.axes, b) || n(this.series, b);
        for (c = 0; !d && c < k.length; c++) d = n(k[c].points || [], b);
        return d
      },
      getAxes: function() {
        var a =
          this,
          b = this.options,
          d = b.xAxis = k(b.xAxis || {}),
          b = b.yAxis = k(b.yAxis || {});
        f(this, "getAxes");
        e(d, function(a, b) {
          a.index = b;
          a.isX = !0
        });
        e(b, function(a, b) {
          a.index = b
        });
        d = d.concat(b);
        e(d, function(b) {
          new g(a, b)
        });
        f(this, "afterGetAxes")
      },
      getSelectedPoints: function() {
        var a = [];
        e(this.series, function(b) {
          a = a.concat(c(b.data || [], function(a) {
            return a.selected
          }))
        });
        return a
      },
      getSelectedSeries: function() {
        return c(this.series, function(a) {
          return a.selected
        })
      },
      setTitle: function(a, b, d) {
        var k = this,
          c = k.options,
          f;
        f = c.title = q({
          style: {
            color: "#333333",
            fontSize: c.isStock ? "16px" : "18px"
          }
        }, c.title, a);
        c = c.subtitle = q({
          style: {
            color: "#666666"
          }
        }, c.subtitle, b);
        e([
          ["title", a, f],
          ["subtitle", b, c]
        ], function(a, b) {
          var d = a[0],
            c = k[d],
            f = a[1];
          a = a[2];
          c && f && (k[d] = c = c.destroy());
          a && !c && (k[d] = k.renderer.text(a.text, 0, 0, a.useHTML).attr({
            align: a.align,
            "class": "highcharts-" + d,
            zIndex: a.zIndex || 4
          }).add(), k[d].update = function(a) {
            k.setTitle(!b && a, b && a)
          }, k[d].css(a.style))
        });
        k.layOutTitles(d)
      },
      layOutTitles: function(a) {
        var b = 0,
          d, k = this.renderer,
          c = this.spacingBox;
        e(["title", "subtitle"],
          function(a) {
            var d = this[a],
              f = this.options[a];
            a = "title" === a ? -3 : f.verticalAlign ? 0 : b + 2;
            var e;
            d && (e = f.style.fontSize, e = k.fontMetrics(e, d).b, d.css({
              width: (f.width || c.width + f.widthAdjust) + "px"
            }).align(t({
              y: a + e
            }, f), !1, "spacingBox"), f.floating || f.verticalAlign || (b = Math.ceil(b + d.getBBox(f.useHTML).height)))
          }, this);
        d = this.titleOffset !== b;
        this.titleOffset = b;
        !this.isDirtyBox && d && (this.isDirtyBox = this.isDirtyLegend = d, this.hasRendered && K(a, !0) && this.isDirtyBox && this.redraw())
      },
      getChartSize: function() {
        var d = this.options.chart,
          k = d.width,
          d = d.height,
          c = this.renderTo;
        b(k) || (this.containerWidth = a.getStyle(c, "width"));
        b(d) || (this.containerHeight = a.getStyle(c, "height"));
        this.chartWidth = Math.max(0, k || this.containerWidth || 600);
        this.chartHeight = Math.max(0, a.relativeLength(d, this.chartWidth) || (1 < this.containerHeight ? this.containerHeight : 400))
      },
      temporaryDisplay: function(b) {
        var d = this.renderTo;
        if (b)
          for (; d && d.style;) d.hcOrigStyle && (a.css(d, d.hcOrigStyle), delete d.hcOrigStyle), d.hcOrigDetached && (m.body.removeChild(d), d.hcOrigDetached = !1), d = d.parentNode;
        else
          for (; d && d.style;) {
            m.body.contains(d) || d.parentNode || (d.hcOrigDetached = !0, m.body.appendChild(d));
            if ("none" === a.getStyle(d, "display", !1) || d.hcOricDetached) d.hcOrigStyle = {
              display: d.style.display,
              height: d.style.height,
              overflow: d.style.overflow
            }, b = {
              display: "block",
              overflow: "hidden"
            }, d !== this.renderTo && (b.height = 0), a.css(d, b), d.offsetWidth || d.style.setProperty("display", "block", "important");
            d = d.parentNode;
            if (d === m.body) break
          }
      },
      setClassName: function(a) {
        this.container.className = "highcharts-container " +
          (a || "")
      },
      getContainer: function() {
        var b, k = this.options,
          c = k.chart,
          e, x;
        b = this.renderTo;
        var l = a.uniqueKey(),
          q;
        b || (this.renderTo = b = c.renderTo);
        D(b) && (this.renderTo = b = m.getElementById(b));
        b || a.error(13, !0);
        e = d(p(b, "data-highcharts-chart"));
        h(e) && y[e] && y[e].hasRendered && y[e].destroy();
        p(b, "data-highcharts-chart", this.index);
        b.innerHTML = "";
        c.skipClone || b.offsetWidth || this.temporaryDisplay();
        this.getChartSize();
        e = this.chartWidth;
        x = this.chartHeight;
        q = t({
          position: "relative",
          overflow: "hidden",
          width: e + "px",
          height: x +
            "px",
          textAlign: "left",
          lineHeight: "normal",
          zIndex: 0,
          "-webkit-tap-highlight-color": "rgba(0,0,0,0)"
        }, c.style);
        this.container = b = v("div", {
          id: l
        }, q, b);
        this._cursor = b.style.cursor;
        this.renderer = new(a[c.renderer] || a.Renderer)(b, e, x, null, c.forExport, k.exporting && k.exporting.allowHTML);
        this.setClassName(c.className);
        this.renderer.setStyle(c.style);
        this.renderer.chartIndex = this.index;
        f(this, "afterGetContainer")
      },
      getMargins: function(a) {
        var d = this.spacing,
          k = this.margin,
          c = this.titleOffset;
        this.resetMargins();
        c &&
          !b(k[0]) && (this.plotTop = Math.max(this.plotTop, c + this.options.title.margin + d[0]));
        this.legend && this.legend.display && this.legend.adjustMargins(k, d);
        this.extraMargin && (this[this.extraMargin.type] = (this[this.extraMargin.type] || 0) + this.extraMargin.value);
        this.adjustPlotArea && this.adjustPlotArea();
        a || this.getAxisMargins()
      },
      getAxisMargins: function() {
        var a = this,
          d = a.axisOffset = [0, 0, 0, 0],
          k = a.margin;
        a.hasCartesianSeries && e(a.axes, function(a) {
          a.visible && a.getOffset()
        });
        e(J, function(c, f) {
          b(k[f]) || (a[c] += d[f])
        });
        a.setChartSize()
      },
      reflow: function(d) {
        var k = this,
          c = k.options.chart,
          f = k.renderTo,
          e = b(c.width) && b(c.height),
          h = c.width || a.getStyle(f, "width"),
          c = c.height || a.getStyle(f, "height"),
          f = d ? d.target : P;
        if (!e && !k.isPrinting && h && c && (f === P || f === m)) {
          if (h !== k.containerWidth || c !== k.containerHeight) a.clearTimeout(k.reflowTimeout), k.reflowTimeout = A(function() {
            k.container && k.setSize(void 0, void 0, !1)
          }, d ? 100 : 0);
          k.containerWidth = h;
          k.containerHeight = c
        }
      },
      setReflow: function(a) {
        var b = this;
        !1 === a || this.unbindReflow ? !1 === a && this.unbindReflow &&
          (this.unbindReflow = this.unbindReflow()) : (this.unbindReflow = B(P, "resize", function(a) {
            b.reflow(a)
          }), B(this, "destroy", this.unbindReflow))
      },
      setSize: function(b, d, k) {
        var c = this,
          h = c.renderer;
        c.isResizing += 1;
        a.setAnimation(k, c);
        c.oldChartHeight = c.chartHeight;
        c.oldChartWidth = c.chartWidth;
        void 0 !== b && (c.options.chart.width = b);
        void 0 !== d && (c.options.chart.height = d);
        c.getChartSize();
        b = h.globalAnimation;
        (b ? C : l)(c.container, {
          width: c.chartWidth + "px",
          height: c.chartHeight + "px"
        }, b);
        c.setChartSize(!0);
        h.setSize(c.chartWidth,
          c.chartHeight, k);
        e(c.axes, function(a) {
          a.isDirty = !0;
          a.setScale()
        });
        c.isDirtyLegend = !0;
        c.isDirtyBox = !0;
        c.layOutTitles();
        c.getMargins();
        c.redraw(k);
        c.oldChartHeight = null;
        f(c, "resize");
        A(function() {
          c && f(c, "endResize", null, function() {
            --c.isResizing
          })
        }, G(b).duration)
      },
      setChartSize: function(a) {
        var b = this.inverted,
          d = this.renderer,
          c = this.chartWidth,
          k = this.chartHeight,
          h = this.options.chart,
          x = this.spacing,
          l = this.clipOffset,
          q, E, r, n;
        this.plotLeft = q = Math.round(this.plotLeft);
        this.plotTop = E = Math.round(this.plotTop);
        this.plotWidth = r = Math.max(0, Math.round(c - q - this.marginRight));
        this.plotHeight = n = Math.max(0, Math.round(k - E - this.marginBottom));
        this.plotSizeX = b ? n : r;
        this.plotSizeY = b ? r : n;
        this.plotBorderWidth = h.plotBorderWidth || 0;
        this.spacingBox = d.spacingBox = {
          x: x[3],
          y: x[0],
          width: c - x[3] - x[1],
          height: k - x[0] - x[2]
        };
        this.plotBox = d.plotBox = {
          x: q,
          y: E,
          width: r,
          height: n
        };
        c = 2 * Math.floor(this.plotBorderWidth / 2);
        b = Math.ceil(Math.max(c, l[3]) / 2);
        d = Math.ceil(Math.max(c, l[0]) / 2);
        this.clipBox = {
          x: b,
          y: d,
          width: Math.floor(this.plotSizeX - Math.max(c,
            l[1]) / 2 - b),
          height: Math.max(0, Math.floor(this.plotSizeY - Math.max(c, l[2]) / 2 - d))
        };
        a || e(this.axes, function(a) {
          a.setAxisSize();
          a.setAxisTranslation()
        });
        f(this, "afterSetChartSize", {
          skipAxes: a
        })
      },
      resetMargins: function() {
        var a = this,
          b = a.options.chart;
        e(["margin", "spacing"], function(d) {
          var c = b[d],
            k = w(c) ? c : [c, c, c, c];
          e(["Top", "Right", "Bottom", "Left"], function(c, f) {
            a[d][f] = K(b[d + c], k[f])
          })
        });
        e(J, function(b, d) {
          a[b] = K(a.margin[d], a.spacing[d])
        });
        a.axisOffset = [0, 0, 0, 0];
        a.clipOffset = [0, 0, 0, 0]
      },
      drawChartBox: function() {
        var a =
          this.options.chart,
          b = this.renderer,
          d = this.chartWidth,
          c = this.chartHeight,
          k = this.chartBackground,
          e = this.plotBackground,
          h = this.plotBorder,
          x, l = this.plotBGImage,
          q = a.backgroundColor,
          E = a.plotBackgroundColor,
          r = a.plotBackgroundImage,
          n, t = this.plotLeft,
          H = this.plotTop,
          g = this.plotWidth,
          A = this.plotHeight,
          K = this.plotBox,
          w = this.clipRect,
          F = this.clipBox,
          m = "animate";
        k || (this.chartBackground = k = b.rect().addClass("highcharts-background").add(), m = "attr");
        x = a.borderWidth || 0;
        n = x + (a.shadow ? 8 : 0);
        q = {
          fill: q || "none"
        };
        if (x || k["stroke-width"]) q.stroke =
          a.borderColor, q["stroke-width"] = x;
        k.attr(q).shadow(a.shadow);
        k[m]({
          x: n / 2,
          y: n / 2,
          width: d - n - x % 2,
          height: c - n - x % 2,
          r: a.borderRadius
        });
        m = "animate";
        e || (m = "attr", this.plotBackground = e = b.rect().addClass("highcharts-plot-background").add());
        e[m](K);
        e.attr({
          fill: E || "none"
        }).shadow(a.plotShadow);
        r && (l ? l.animate(K) : this.plotBGImage = b.image(r, t, H, g, A).add());
        w ? w.animate({
          width: F.width,
          height: F.height
        }) : this.clipRect = b.clipRect(F);
        m = "animate";
        h || (m = "attr", this.plotBorder = h = b.rect().addClass("highcharts-plot-border").attr({
          zIndex: 1
        }).add());
        h.attr({
          stroke: a.plotBorderColor,
          "stroke-width": a.plotBorderWidth || 0,
          fill: "none"
        });
        h[m](h.crisp({
          x: t,
          y: H,
          width: g,
          height: A
        }, -h.strokeWidth()));
        this.isDirtyBox = !1;
        f(this, "afterDrawChartBox")
      },
      propFromSeries: function() {
        var a = this,
          b = a.options.chart,
          d, c = a.options.series,
          k, f;
        e(["inverted", "angular", "polar"], function(e) {
          d = E[b.type || b.defaultSeriesType];
          f = b[e] || d && d.prototype[e];
          for (k = c && c.length; !f && k--;)(d = E[c[k].type]) && d.prototype[e] && (f = !0);
          a[e] = f
        })
      },
      linkSeries: function() {
        var a = this,
          b = a.series;
        e(b, function(a) {
          a.linkedSeries.length =
            0
        });
        e(b, function(b) {
          var d = b.options.linkedTo;
          D(d) && (d = ":previous" === d ? a.series[b.index - 1] : a.get(d)) && d.linkedParent !== b && (d.linkedSeries.push(b), b.linkedParent = d, b.visible = K(b.options.visible, d.options.visible, b.visible))
        });
        f(this, "afterLinkSeries")
      },
      renderSeries: function() {
        e(this.series, function(a) {
          a.translate();
          a.render()
        })
      },
      renderLabels: function() {
        var a = this,
          b = a.options.labels;
        b.items && e(b.items, function(c) {
          var k = t(b.style, c.style),
            f = d(k.left) + a.plotLeft,
            e = d(k.top) + a.plotTop + 12;
          delete k.left;
          delete k.top;
          a.renderer.text(c.html, f, e).attr({
            zIndex: 2
          }).css(k).add()
        })
      },
      render: function() {
        var a = this.axes,
          b = this.renderer,
          d = this.options,
          c, k, f;
        this.setTitle();
        this.legend = new r(this, d.legend);
        this.getStacks && this.getStacks();
        this.getMargins(!0);
        this.setChartSize();
        d = this.plotWidth;
        c = this.plotHeight = Math.max(this.plotHeight - 21, 0);
        e(a, function(a) {
          a.setScale()
        });
        this.getAxisMargins();
        k = 1.1 < d / this.plotWidth;
        f = 1.05 < c / this.plotHeight;
        if (k || f) e(a, function(a) {
          (a.horiz && k || !a.horiz && f) && a.setTickInterval(!0)
        }), this.getMargins();
        this.drawChartBox();
        this.hasCartesianSeries && e(a, function(a) {
          a.visible && a.render()
        });
        this.seriesGroup || (this.seriesGroup = b.g("series-group").attr({
          zIndex: 3
        }).add());
        this.renderSeries();
        this.renderLabels();
        this.addCredits();
        this.setResponsive && this.setResponsive();
        this.hasRendered = !0
      },
      addCredits: function(a) {
        var b = this;
        a = q(!0, this.options.credits, a);
        a.enabled && !this.credits && (this.credits = this.renderer.text(a.text + (this.mapCredits || ""), 0, 0).addClass("highcharts-credits").on("click", function() {
          a.href &&
            (P.location.href = a.href)
        }).attr({
          align: a.position.align,
          zIndex: 8
        }).css(a.style).add().align(a.position), this.credits.update = function(a) {
          b.credits = b.credits.destroy();
          b.addCredits(a)
        })
      },
      destroy: function() {
        var b = this,
          d = b.axes,
          c = b.series,
          k = b.container,
          h, x = k && k.parentNode;
        f(b, "destroy");
        b.renderer.forExport ? a.erase(y, b) : y[b.index] = void 0;
        a.chartCount--;
        b.renderTo.removeAttribute("data-highcharts-chart");
        H(b);
        for (h = d.length; h--;) d[h] = d[h].destroy();
        this.scroller && this.scroller.destroy && this.scroller.destroy();
        for (h = c.length; h--;) c[h] = c[h].destroy();
        e("title subtitle chartBackground plotBackground plotBGImage plotBorder seriesGroup clipRect credits pointer rangeSelector legend resetZoomButton tooltip renderer".split(" "), function(a) {
          var d = b[a];
          d && d.destroy && (b[a] = d.destroy())
        });
        k && (k.innerHTML = "", H(k), x && u(k));
        F(b, function(a, d) {
          delete b[d]
        })
      },
      firstRender: function() {
        var a = this,
          b = a.options;
        if (!a.isReadyToRender || a.isReadyToRender()) {
          a.getContainer();
          a.resetMargins();
          a.setChartSize();
          a.propFromSeries();
          a.getAxes();
          e(b.series || [], function(b) {
            a.initSeries(b)
          });
          a.linkSeries();
          f(a, "beforeRender");
          x && (a.pointer = new x(a, b));
          a.render();
          if (!a.renderer.imgCount && a.onload) a.onload();
          a.temporaryDisplay(!0)
        }
      },
      onload: function() {
        e([this.callback].concat(this.callbacks), function(a) {
          a && void 0 !== this.index && a.apply(this, [this])
        }, this);
        f(this, "load");
        f(this, "render");
        b(this.index) && this.setReflow(this.options.chart.reflow);
        this.onload = null
      }
    })
  })(L);
  (function(a) {
    var B = a.addEvent,
      C = a.Chart,
      G = a.each;
    B(C, "afterSetChartSize", function(p) {
      var m =
        this.options.chart.scrollablePlotArea;
      if (m = m && m.minWidth)
        if (this.scrollablePixels = m = Math.max(0, m - this.chartWidth)) this.plotWidth += m, this.clipBox.width += m, p.skipAxes || G(this.axes, function(g) {
          1 === g.side ? g.getPlotLinePath = function() {
            var m = this.right,
              p;
            this.right = m - g.chart.scrollablePixels;
            p = a.Axis.prototype.getPlotLinePath.apply(this, arguments);
            this.right = m;
            return p
          } : (g.setAxisSize(), g.setAxisTranslation())
        })
    });
    B(C, "render", function() {
      this.scrollablePixels ? (this.setUpScrolling && this.setUpScrolling(),
        this.applyFixed()) : this.fixedDiv && this.applyFixed()
    });
    C.prototype.setUpScrolling = function() {
      this.scrollingContainer = a.createElement("div", {
        className: "highcharts-scrolling"
      }, {
        overflowX: "auto",
        WebkitOverflowScrolling: "touch"
      }, this.renderTo);
      this.innerContainer = a.createElement("div", {
        className: "highcharts-inner-container"
      }, null, this.scrollingContainer);
      this.innerContainer.appendChild(this.container);
      this.setUpScrolling = null
    };
    C.prototype.applyFixed = function() {
      var p = this.container,
        m, g;
      this.fixedDiv || (this.fixedDiv =
        a.createElement("div", {
          className: "highcharts-fixed"
        }, {
          position: "absolute",
          overflow: "hidden",
          pointerEvents: "none",
          zIndex: 2
        }, null, !0), this.renderTo.insertBefore(this.fixedDiv, this.renderTo.firstChild), this.fixedRenderer = m = new a.Renderer(this.fixedDiv, 0, 0), this.scrollableMask = m.path().attr({
          fill: a.color(this.options.chart.backgroundColor || "#fff").setOpacity(.85).get(),
          zIndex: -1
        }).addClass("highcharts-scrollable-mask").add(), a.each([this.inverted ? ".highcharts-xaxis" : ".highcharts-yaxis", this.inverted ?
          ".highcharts-xaxis-labels" : ".highcharts-yaxis-labels", ".highcharts-contextbutton", ".highcharts-credits", ".highcharts-legend", ".highcharts-subtitle", ".highcharts-title"
        ], function(g) {
          a.each(p.querySelectorAll(g), function(a) {
            m.box.appendChild(a);
            a.style.pointerEvents = "auto"
          })
        }));
      this.fixedRenderer.setSize(this.chartWidth, this.chartHeight);
      g = this.chartWidth + this.scrollablePixels;
      this.container.style.width = g + "px";
      this.renderer.boxWrapper.attr({
        width: g,
        height: this.chartHeight,
        viewBox: [0, 0, g, this.chartHeight].join(" ")
      });
      g = this.options.chart.scrollablePlotArea;
      g.scrollPositionX && (this.scrollingContainer.scrollLeft = this.scrollablePixels * g.scrollPositionX);
      var v = this.axisOffset;
      g = this.plotTop - v[0] - 1;
      var v = this.plotTop + this.plotHeight + v[2],
        z = this.plotLeft + this.plotWidth - this.scrollablePixels;
      this.scrollableMask.attr({
        d: this.scrollablePixels ? ["M", 0, g, "L", this.plotLeft - 1, g, "L", this.plotLeft - 1, v, "L", 0, v, "Z", "M", z, g, "L", this.chartWidth, g, "L", this.chartWidth, v, "L", z, v, "Z"] : ["M", 0, 0]
      })
    }
  })(L);
  (function(a) {
    var B, C = a.each,
      G =
      a.extend,
      p = a.erase,
      m = a.fireEvent,
      g = a.format,
      v = a.isArray,
      z = a.isNumber,
      u = a.pick,
      y = a.removeEvent;
    a.Point = B = function() {};
    a.Point.prototype = {
      init: function(a, b, e) {
        this.series = a;
        this.color = a.color;
        this.applyOptions(b, e);
        a.options.colorByPoint ? (b = a.options.colors || a.chart.options.colors, this.color = this.color || b[a.colorCounter], b = b.length, e = a.colorCounter, a.colorCounter++, a.colorCounter === b && (a.colorCounter = 0)) : e = a.colorIndex;
        this.colorIndex = u(this.colorIndex, e);
        a.chart.pointCount++;
        m(this, "afterInit");
        return this
      },
      applyOptions: function(a, b) {
        var e = this.series,
          l = e.options.pointValKey || e.pointValKey;
        a = B.prototype.optionsToObject.call(this, a);
        G(this, a);
        this.options = this.options ? G(this.options, a) : a;
        a.group && delete this.group;
        l && (this.y = this[l]);
        this.isNull = u(this.isValid && !this.isValid(), null === this.x || !z(this.y, !0));
        this.selected && (this.state = "select");
        "name" in this && void 0 === b && e.xAxis && e.xAxis.hasNames && (this.x = e.xAxis.nameToX(this));
        void 0 === this.x && e && (this.x = void 0 === b ? e.autoIncrement(this) : b);
        return this
      },
      setNestedProperty: function(l, b, e) {
        e = e.split(".");
        a.reduce(e, function(e, l, f, c) {
          e[l] = c.length - 1 === f ? b : a.isObject(e[l], !0) ? e[l] : {};
          return e[l]
        }, l);
        return l
      },
      optionsToObject: function(l) {
        var b = {},
          e = this.series,
          t = e.options.keys,
          n = t || e.pointArrayMap || ["y"],
          f = n.length,
          c = 0,
          h = 0;
        if (z(l) || null === l) b[n[0]] = l;
        else if (v(l))
          for (!t && l.length > f && (e = typeof l[0], "string" === e ? b.name = l[0] : "number" === e && (b.x = l[0]), c++); h < f;) t && void 0 === l[c] || (0 < n[h].indexOf(".") ? a.Point.prototype.setNestedProperty(b, l[c], n[h]) : b[n[h]] =
            l[c]), c++, h++;
        else "object" === typeof l && (b = l, l.dataLabels && (e._hasPointLabels = !0), l.marker && (e._hasPointMarkers = !0));
        return b
      },
      getClassName: function() {
        return "highcharts-point" + (this.selected ? " highcharts-point-select" : "") + (this.negative ? " highcharts-negative" : "") + (this.isNull ? " highcharts-null-point" : "") + (void 0 !== this.colorIndex ? " highcharts-color-" + this.colorIndex : "") + (this.options.className ? " " + this.options.className : "") + (this.zone && this.zone.className ? " " + this.zone.className.replace("highcharts-negative",
          "") : "")
      },
      getZone: function() {
        var a = this.series,
          b = a.zones,
          a = a.zoneAxis || "y",
          e = 0,
          t;
        for (t = b[e]; this[a] >= t.value;) t = b[++e];
        this.nonZonedColor || (this.nonZonedColor = this.color);
        this.color = t && t.color && !this.options.color ? t.color : this.nonZonedColor;
        return t
      },
      destroy: function() {
        var a = this.series.chart,
          b = a.hoverPoints,
          e;
        a.pointCount--;
        b && (this.setState(), p(b, this), b.length || (a.hoverPoints = null));
        if (this === a.hoverPoint) this.onMouseOut();
        if (this.graphic || this.dataLabel) y(this), this.destroyElements();
        this.legendItem &&
          a.legend.destroyItem(this);
        for (e in this) this[e] = null
      },
      destroyElements: function() {
        for (var a = ["graphic", "dataLabel", "dataLabelUpper", "connector", "shadowGroup"], b, e = 6; e--;) b = a[e], this[b] && (this[b] = this[b].destroy())
      },
      getLabelConfig: function() {
        return {
          x: this.category,
          y: this.y,
          color: this.color,
          colorIndex: this.colorIndex,
          key: this.name || this.category,
          series: this.series,
          point: this,
          percentage: this.percentage,
          total: this.total || this.stackTotal
        }
      },
      tooltipFormatter: function(a) {
        var b = this.series,
          e = b.tooltipOptions,
          l = u(e.valueDecimals, ""),
          n = e.valuePrefix || "",
          f = e.valueSuffix || "";
        C(b.pointArrayMap || ["y"], function(b) {
          b = "{point." + b;
          if (n || f) a = a.replace(RegExp(b + "}", "g"), n + b + "}" + f);
          a = a.replace(RegExp(b + "}", "g"), b + ":,." + l + "f}")
        });
        return g(a, {
          point: this,
          series: this.series
        }, b.chart.time)
      },
      firePointEvent: function(a, b, e) {
        var l = this,
          n = this.series.options;
        (n.point.events[a] || l.options && l.options.events && l.options.events[a]) && this.importEvents();
        "click" === a && n.allowPointSelect && (e = function(a) {
          l.select && l.select(null, a.ctrlKey ||
            a.metaKey || a.shiftKey)
        });
        m(this, a, b, e)
      },
      visible: !0
    }
  })(L);
  (function(a) {
    var B = a.addEvent,
      C = a.animObject,
      G = a.arrayMax,
      p = a.arrayMin,
      m = a.correctFloat,
      g = a.defaultOptions,
      v = a.defaultPlotOptions,
      z = a.defined,
      u = a.each,
      y = a.erase,
      l = a.extend,
      b = a.fireEvent,
      e = a.grep,
      t = a.isArray,
      n = a.isNumber,
      f = a.isString,
      c = a.merge,
      h = a.objectEach,
      w = a.pick,
      D = a.removeEvent,
      r = a.splat,
      J = a.SVGElement,
      q = a.syncTimeout,
      F = a.win;
    a.Series = a.seriesType("line", null, {
      lineWidth: 2,
      allowPointSelect: !1,
      showCheckbox: !1,
      animation: {
        duration: 1E3
      },
      events: {},
      marker: {
        lineWidth: 0,
        lineColor: "#ffffff",
        enabledThreshold: 2,
        radius: 4,
        states: {
          normal: {
            animation: !0
          },
          hover: {
            animation: {
              duration: 50
            },
            enabled: !0,
            radiusPlus: 2,
            lineWidthPlus: 1
          },
          select: {
            fillColor: "#cccccc",
            lineColor: "#000000",
            lineWidth: 2
          }
        }
      },
      point: {
        events: {}
      },
      dataLabels: {
        align: "center",
        formatter: function() {
          return null === this.y ? "" : a.numberFormat(this.y, -1)
        },
        style: {
          fontSize: "11px",
          fontWeight: "bold",
          color: "contrast",
          textOutline: "1px contrast"
        },
        verticalAlign: "bottom",
        x: 0,
        y: 0,
        padding: 5
      },
      cropThreshold: 300,
      pointRange: 0,
      softThreshold: !0,
      states: {
        normal: {
          animation: !0
        },
        hover: {
          animation: {
            duration: 50
          },
          lineWidthPlus: 1,
          marker: {},
          halo: {
            size: 10,
            opacity: .25
          }
        },
        select: {
          marker: {}
        }
      },
      stickyTracking: !0,
      turboThreshold: 1E3,
      findNearestPointBy: "x"
    }, {
      isCartesian: !0,
      pointClass: a.Point,
      sorted: !0,
      requireSorting: !0,
      directTouch: !1,
      axisTypes: ["xAxis", "yAxis"],
      colorCounter: 0,
      parallelArrays: ["x", "y"],
      coll: "series",
      init: function(a, c) {
        var d = this,
          f, e = a.series,
          k;
        d.chart = a;
        d.options = c = d.setOptions(c);
        d.linkedSeries = [];
        d.bindAxes();
        l(d, {
          name: c.name,
          state: "",
          visible: !1 !== c.visible,
          selected: !0 === c.selected
        });
        f = c.events;
        h(f, function(a, b) {
          B(d, b, a)
        });
        if (f && f.click || c.point && c.point.events && c.point.events.click || c.allowPointSelect) a.runTrackerClick = !0;
        d.getColor();
        d.getSymbol();
        u(d.parallelArrays, function(a) {
          d[a + "Data"] = []
        });
        d.setData(c.data, !1);
        d.isCartesian && (a.hasCartesianSeries = !0);
        e.length && (k = e[e.length - 1]);
        d._i = w(k && k._i, -1) + 1;
        a.orderSeries(this.insert(e));
        b(this, "afterInit")
      },
      insert: function(a) {
        var b = this.options.index,
          d;
        if (n(b)) {
          for (d = a.length; d--;)
            if (b >=
              w(a[d].options.index, a[d]._i)) {
              a.splice(d + 1, 0, this);
              break
            } - 1 === d && a.unshift(this);
          d += 1
        } else a.push(this);
        return w(d, a.length - 1)
      },
      bindAxes: function() {
        var b = this,
          c = b.options,
          d = b.chart,
          f;
        u(b.axisTypes || [], function(e) {
          u(d[e], function(a) {
            f = a.options;
            if (c[e] === f.index || void 0 !== c[e] && c[e] === f.id || void 0 === c[e] && 0 === f.index) b.insert(a.series), b[e] = a, a.isDirty = !0
          });
          b[e] || b.optionalAxis === e || a.error(18, !0)
        })
      },
      updateParallelArrays: function(a, b) {
        var d = a.series,
          c = arguments,
          f = n(b) ? function(c) {
            var k = "y" === c && d.toYData ?
              d.toYData(a) : a[c];
            d[c + "Data"][b] = k
          } : function(a) {
            Array.prototype[b].apply(d[a + "Data"], Array.prototype.slice.call(c, 2))
          };
        u(d.parallelArrays, f)
      },
      autoIncrement: function() {
        var a = this.options,
          b = this.xIncrement,
          d, c = a.pointIntervalUnit,
          f = this.chart.time,
          b = w(b, a.pointStart, 0);
        this.pointInterval = d = w(this.pointInterval, a.pointInterval, 1);
        c && (a = new f.Date(b), "day" === c ? f.set("Date", a, f.get("Date", a) + d) : "month" === c ? f.set("Month", a, f.get("Month", a) + d) : "year" === c && f.set("FullYear", a, f.get("FullYear", a) + d), d = a.getTime() -
          b);
        this.xIncrement = b + d;
        return b
      },
      setOptions: function(a) {
        var f = this.chart,
          d = f.options,
          e = d.plotOptions,
          h = (f.userOptions || {}).plotOptions || {},
          k = e[this.type];
        this.userOptions = a;
        f = c(k, e.series, a);
        this.tooltipOptions = c(g.tooltip, g.plotOptions.series && g.plotOptions.series.tooltip, g.plotOptions[this.type].tooltip, d.tooltip.userOptions, e.series && e.series.tooltip, e[this.type].tooltip, a.tooltip);
        this.stickyTracking = w(a.stickyTracking, h[this.type] && h[this.type].stickyTracking, h.series && h.series.stickyTracking,
          this.tooltipOptions.shared && !this.noSharedTooltip ? !0 : f.stickyTracking);
        null === k.marker && delete f.marker;
        this.zoneAxis = f.zoneAxis;
        a = this.zones = (f.zones || []).slice();
        !f.negativeColor && !f.negativeFillColor || f.zones || a.push({
          value: f[this.zoneAxis + "Threshold"] || f.threshold || 0,
          className: "highcharts-negative",
          color: f.negativeColor,
          fillColor: f.negativeFillColor
        });
        a.length && z(a[a.length - 1].value) && a.push({
          color: this.color,
          fillColor: this.fillColor
        });
        b(this, "afterSetOptions", {
          options: f
        });
        return f
      },
      getName: function() {
        return this.name ||
          "Series " + (this.index + 1)
      },
      getCyclic: function(a, b, d) {
        var c, f = this.chart,
          k = this.userOptions,
          e = a + "Index",
          h = a + "Counter",
          x = d ? d.length : w(f.options.chart[a + "Count"], f[a + "Count"]);
        b || (c = w(k[e], k["_" + e]), z(c) || (f.series.length || (f[h] = 0), k["_" + e] = c = f[h] % x, f[h] += 1), d && (b = d[c]));
        void 0 !== c && (this[e] = c);
        this[a] = b
      },
      getColor: function() {
        this.options.colorByPoint ? this.options.color = null : this.getCyclic("color", this.options.color || v[this.type].color, this.chart.options.colors)
      },
      getSymbol: function() {
        this.getCyclic("symbol",
          this.options.marker.symbol, this.chart.options.symbols)
      },
      drawLegendSymbol: a.LegendSymbolMixin.drawLineMarker,
      updateData: function(b) {
        var c = this.options,
          d = this.points,
          f = [],
          e, k, h, x = this.requireSorting;
        u(b, function(b) {
          var k;
          k = a.defined(b) && this.pointClass.prototype.optionsToObject.call({
            series: this
          }, b).x;
          n(k) && (k = a.inArray(k, this.xData, h), -1 === k ? f.push(b) : b !== c.data[k] ? (d[k].update(b, !1, null, !1), d[k].touched = !0, x && (h = k)) : d[k] && (d[k].touched = !0), e = !0)
        }, this);
        if (e)
          for (b = d.length; b--;) k = d[b], k.touched || k.remove(!1),
            k.touched = !1;
        else if (b.length === d.length) u(b, function(a, b) {
          d[b].update && a !== c.data[b] && d[b].update(a, !1, null, !1)
        });
        else return !1;
        u(f, function(a) {
          this.addPoint(a, !1)
        }, this);
        return !0
      },
      setData: function(b, c, d, e) {
        var h = this,
          k = h.points,
          x = k && k.length || 0,
          q, l = h.options,
          r = h.chart,
          g = null,
          H = h.xAxis,
          F = l.turboThreshold,
          m = this.xData,
          D = this.yData,
          K = (q = h.pointArrayMap) && q.length,
          J;
        b = b || [];
        q = b.length;
        c = w(c, !0);
        !1 !== e && q && x && !h.cropped && !h.hasGroupedData && h.visible && (J = this.updateData(b));
        if (!J) {
          h.xIncrement = null;
          h.colorCounter =
            0;
          u(this.parallelArrays, function(a) {
            h[a + "Data"].length = 0
          });
          if (F && q > F) {
            for (d = 0; null === g && d < q;) g = b[d], d++;
            if (n(g))
              for (d = 0; d < q; d++) m[d] = this.autoIncrement(), D[d] = b[d];
            else if (t(g))
              if (K)
                for (d = 0; d < q; d++) g = b[d], m[d] = g[0], D[d] = g.slice(1, K + 1);
              else
                for (d = 0; d < q; d++) g = b[d], m[d] = g[0], D[d] = g[1];
            else a.error(12)
          } else
            for (d = 0; d < q; d++) void 0 !== b[d] && (g = {
              series: h
            }, h.pointClass.prototype.applyOptions.apply(g, [b[d]]), h.updateParallelArrays(g, d));
          D && f(D[0]) && a.error(14, !0);
          h.data = [];
          h.options.data = h.userOptions.data =
            b;
          for (d = x; d--;) k[d] && k[d].destroy && k[d].destroy();
          H && (H.minRange = H.userMinRange);
          h.isDirty = r.isDirtyBox = !0;
          h.isDirtyData = !!k;
          d = !1
        }
        "point" === l.legendType && (this.processData(), this.generatePoints());
        c && r.redraw(d)
      },
      processData: function(b) {
        var c = this.xData,
          d = this.yData,
          f = c.length,
          e;
        e = 0;
        var k, h, x = this.xAxis,
          q, l = this.options;
        q = l.cropThreshold;
        var r = this.getExtremesFromAll || l.getExtremesFromAll,
          n = this.isCartesian,
          l = x && x.val2lin,
          g = x && x.isLog,
          t = this.requireSorting,
          w, F;
        if (n && !this.isDirty && !x.isDirty && !this.yAxis.isDirty &&
          !b) return !1;
        x && (b = x.getExtremes(), w = b.min, F = b.max);
        if (n && this.sorted && !r && (!q || f > q || this.forceCrop))
          if (c[f - 1] < w || c[0] > F) c = [], d = [];
          else if (c[0] < w || c[f - 1] > F) e = this.cropData(this.xData, this.yData, w, F), c = e.xData, d = e.yData, e = e.start, k = !0;
        for (q = c.length || 1; --q;) f = g ? l(c[q]) - l(c[q - 1]) : c[q] - c[q - 1], 0 < f && (void 0 === h || f < h) ? h = f : 0 > f && t && (a.error(15), t = !1);
        this.cropped = k;
        this.cropStart = e;
        this.processedXData = c;
        this.processedYData = d;
        this.closestPointRange = h
      },
      cropData: function(a, b, d, c, f) {
        var k = a.length,
          e = 0,
          h = k,
          x;
        f =
          w(f, this.cropShoulder, 1);
        for (x = 0; x < k; x++)
          if (a[x] >= d) {
            e = Math.max(0, x - f);
            break
          }
        for (d = x; d < k; d++)
          if (a[d] > c) {
            h = d + f;
            break
          }
        return {
          xData: a.slice(e, h),
          yData: b.slice(e, h),
          start: e,
          end: h
        }
      },
      generatePoints: function() {
        var a = this.options,
          b = a.data,
          d = this.data,
          c, f = this.processedXData,
          k = this.processedYData,
          e = this.pointClass,
          h = f.length,
          q = this.cropStart || 0,
          l, n = this.hasGroupedData,
          a = a.keys,
          g, t = [],
          w;
        d || n || (d = [], d.length = b.length, d = this.data = d);
        a && n && (this.options.keys = !1);
        for (w = 0; w < h; w++) l = q + w, n ? (g = (new e).init(this, [f[w]].concat(r(k[w]))),
          g.dataGroup = this.groupMap[w]) : (g = d[l]) || void 0 === b[l] || (d[l] = g = (new e).init(this, b[l], f[w])), g && (g.index = l, t[w] = g);
        this.options.keys = a;
        if (d && (h !== (c = d.length) || n))
          for (w = 0; w < c; w++) w !== q || n || (w += h), d[w] && (d[w].destroyElements(), d[w].plotX = void 0);
        this.data = d;
        this.points = t
      },
      getExtremes: function(a) {
        var b = this.yAxis,
          d = this.processedXData,
          c, f = [],
          k = 0;
        c = this.xAxis.getExtremes();
        var e = c.min,
          h = c.max,
          q, x, l = this.requireSorting ? 1 : 0,
          r, g;
        a = a || this.stackedYData || this.processedYData || [];
        c = a.length;
        for (g = 0; g < c; g++)
          if (x =
            d[g], r = a[g], q = (n(r, !0) || t(r)) && (!b.positiveValuesOnly || r.length || 0 < r), x = this.getExtremesFromAll || this.options.getExtremesFromAll || this.cropped || (d[g + l] || x) >= e && (d[g - l] || x) <= h, q && x)
            if (q = r.length)
              for (; q--;) "number" === typeof r[q] && (f[k++] = r[q]);
            else f[k++] = r;
        this.dataMin = p(f);
        this.dataMax = G(f)
      },
      translate: function() {
        this.processedXData || this.processData();
        this.generatePoints();
        var a = this.options,
          c = a.stacking,
          d = this.xAxis,
          f = d.categories,
          e = this.yAxis,
          k = this.points,
          h = k.length,
          q = !!this.modifyValue,
          l = a.pointPlacement,
          r = "between" === l || n(l),
          g = a.threshold,
          t = a.startFromThreshold ? g : 0,
          F, D, J, u, v = Number.MAX_VALUE;
        "between" === l && (l = .5);
        n(l) && (l *= w(a.pointRange || d.pointRange));
        for (a = 0; a < h; a++) {
          var p = k[a],
            y = p.x,
            C = p.y;
          D = p.low;
          var B = c && e.stacks[(this.negStacks && C < (t ? 0 : g) ? "-" : "") + this.stackKey],
            G;
          e.positiveValuesOnly && null !== C && 0 >= C && (p.isNull = !0);
          p.plotX = F = m(Math.min(Math.max(-1E5, d.translate(y, 0, 0, 0, 1, l, "flags" === this.type)), 1E5));
          c && this.visible && !p.isNull && B && B[y] && (u = this.getStackIndicator(u, y, this.index), G = B[y], C = G.points[u.key],
            D = C[0], C = C[1], D === t && u.key === B[y].base && (D = w(n(g) && g, e.min)), e.positiveValuesOnly && 0 >= D && (D = null), p.total = p.stackTotal = G.total, p.percentage = G.total && p.y / G.total * 100, p.stackY = C, G.setOffset(this.pointXOffset || 0, this.barW || 0));
          p.yBottom = z(D) ? Math.min(Math.max(-1E5, e.translate(D, 0, 1, 0, 1)), 1E5) : null;
          q && (C = this.modifyValue(C, p));
          p.plotY = D = "number" === typeof C && Infinity !== C ? Math.min(Math.max(-1E5, e.translate(C, 0, 1, 0, 1)), 1E5) : void 0;
          p.isInside = void 0 !== D && 0 <= D && D <= e.len && 0 <= F && F <= d.len;
          p.clientX = r ? m(d.translate(y,
            0, 0, 0, 1, l)) : F;
          p.negative = p.y < (g || 0);
          p.category = f && void 0 !== f[p.x] ? f[p.x] : p.x;
          p.isNull || (void 0 !== J && (v = Math.min(v, Math.abs(F - J))), J = F);
          p.zone = this.zones.length && p.getZone()
        }
        this.closestPointRangePx = v;
        b(this, "afterTranslate")
      },
      getValidPoints: function(a, b) {
        var d = this.chart;
        return e(a || this.points || [], function(a) {
          return b && !d.isInsidePlot(a.plotX, a.plotY, d.inverted) ? !1 : !a.isNull
        })
      },
      setClip: function(a) {
        var b = this.chart,
          d = this.options,
          c = b.renderer,
          f = b.inverted,
          k = this.clipBox,
          e = k || b.clipBox,
          h = this.sharedClipKey || ["_sharedClip", a && a.duration, a && a.easing, e.height, d.xAxis, d.yAxis].join(),
          q = b[h],
          l = b[h + "m"];
        q || (a && (e.width = 0, f && (e.x = b.plotSizeX), b[h + "m"] = l = c.clipRect(f ? b.plotSizeX + 99 : -99, f ? -b.plotLeft : -b.plotTop, 99, f ? b.chartWidth : b.chartHeight)), b[h] = q = c.clipRect(e), q.count = {
          length: 0
        });
        a && !q.count[this.index] && (q.count[this.index] = !0, q.count.length += 1);
        !1 !== d.clip && (this.group.clip(a || k ? q : b.clipRect), this.markerGroup.clip(l), this.sharedClipKey = h);
        a || (q.count[this.index] && (delete q.count[this.index], --q.count.length),
          0 === q.count.length && h && b[h] && (k || (b[h] = b[h].destroy()), b[h + "m"] && (b[h + "m"] = b[h + "m"].destroy())))
      },
      animate: function(a) {
        var b = this.chart,
          d = C(this.options.animation),
          c;
        a ? this.setClip(d) : (c = this.sharedClipKey, (a = b[c]) && a.animate({
          width: b.plotSizeX,
          x: 0
        }, d), b[c + "m"] && b[c + "m"].animate({
          width: b.plotSizeX + 99,
          x: 0
        }, d), this.animate = null)
      },
      afterAnimate: function() {
        this.setClip();
        b(this, "afterAnimate");
        this.finishedAnimating = !0
      },
      drawPoints: function() {
        var a = this.points,
          b = this.chart,
          d, c, f, k, e = this.options.marker,
          h, q, l, r = this[this.specialGroup] || this.markerGroup,
          g, n = w(e.enabled, this.xAxis.isRadial ? !0 : null, this.closestPointRangePx >= e.enabledThreshold * e.radius);
        if (!1 !== e.enabled || this._hasPointMarkers)
          for (d = 0; d < a.length; d++) c = a[d], k = c.graphic, h = c.marker || {}, q = !!c.marker, f = n && void 0 === h.enabled || h.enabled, l = c.isInside, f && !c.isNull ? (f = w(h.symbol, this.symbol), g = this.markerAttribs(c, c.selected && "select"), k ? k[l ? "show" : "hide"](!0).animate(g) : l && (0 < g.width || c.hasImage) && (c.graphic = k = b.renderer.symbol(f, g.x, g.y, g.width,
            g.height, q ? h : e).add(r)), k && k.attr(this.pointAttribs(c, c.selected && "select")), k && k.addClass(c.getClassName(), !0)) : k && (c.graphic = k.destroy())
      },
      markerAttribs: function(a, b) {
        var d = this.options.marker,
          c = a.marker || {},
          f = c.symbol || d.symbol,
          k = w(c.radius, d.radius);
        b && (d = d.states[b], b = c.states && c.states[b], k = w(b && b.radius, d && d.radius, k + (d && d.radiusPlus || 0)));
        a.hasImage = f && 0 === f.indexOf("url");
        a.hasImage && (k = 0);
        a = {
          x: Math.floor(a.plotX) - k,
          y: a.plotY - k
        };
        k && (a.width = a.height = 2 * k);
        return a
      },
      pointAttribs: function(a,
        b) {
        var d = this.options.marker,
          c = a && a.options,
          f = c && c.marker || {},
          k = this.color,
          e = c && c.color,
          h = a && a.color,
          c = w(f.lineWidth, d.lineWidth);
        a = a && a.zone && a.zone.color;
        k = e || a || h || k;
        a = f.fillColor || d.fillColor || k;
        k = f.lineColor || d.lineColor || k;
        b && (d = d.states[b], b = f.states && f.states[b] || {}, c = w(b.lineWidth, d.lineWidth, c + w(b.lineWidthPlus, d.lineWidthPlus, 0)), a = b.fillColor || d.fillColor || a, k = b.lineColor || d.lineColor || k);
        return {
          stroke: k,
          "stroke-width": c,
          fill: a
        }
      },
      destroy: function() {
        var c = this,
          f = c.chart,
          d = /AppleWebKit\/533/.test(F.navigator.userAgent),
          e, q, k = c.data || [],
          l, r;
        b(c, "destroy");
        D(c);
        u(c.axisTypes || [], function(a) {
          (r = c[a]) && r.series && (y(r.series, c), r.isDirty = r.forceRedraw = !0)
        });
        c.legendItem && c.chart.legend.destroyItem(c);
        for (q = k.length; q--;)(l = k[q]) && l.destroy && l.destroy();
        c.points = null;
        a.clearTimeout(c.animationTimeout);
        h(c, function(a, b) {
          a instanceof J && !a.survive && (e = d && "group" === b ? "hide" : "destroy", a[e]())
        });
        f.hoverSeries === c && (f.hoverSeries = null);
        y(f.series, c);
        f.orderSeries();
        h(c, function(a, b) {
          delete c[b]
        })
      },
      getGraphPath: function(a, b,
        d) {
        var c = this,
          f = c.options,
          k = f.step,
          e, h = [],
          q = [],
          l;
        a = a || c.points;
        (e = a.reversed) && a.reverse();
        (k = {
          right: 1,
          center: 2
        }[k] || k && 3) && e && (k = 4 - k);
        !f.connectNulls || b || d || (a = this.getValidPoints(a));
        u(a, function(e, r) {
          var x = e.plotX,
            g = e.plotY,
            n = a[r - 1];
          (e.leftCliff || n && n.rightCliff) && !d && (l = !0);
          e.isNull && !z(b) && 0 < r ? l = !f.connectNulls : e.isNull && !b ? l = !0 : (0 === r || l ? r = ["M", e.plotX, e.plotY] : c.getPointSpline ? r = c.getPointSpline(a, e, r) : k ? (r = 1 === k ? ["L", n.plotX, g] : 2 === k ? ["L", (n.plotX + x) / 2, n.plotY, "L", (n.plotX + x) / 2, g] : ["L", x,
            n.plotY
          ], r.push("L", x, g)) : r = ["L", x, g], q.push(e.x), k && (q.push(e.x), 2 === k && q.push(e.x)), h.push.apply(h, r), l = !1)
        });
        h.xMap = q;
        return c.graphPath = h
      },
      drawGraph: function() {
        var a = this,
          b = this.options,
          d = (this.gappedPath || this.getGraphPath).call(this),
          c = [
            ["graph", "highcharts-graph", b.lineColor || this.color, b.dashStyle]
          ],
          c = a.getZonesGraphs(c);
        u(c, function(c, f) {
          var k = c[0],
            e = a[k];
          e ? (e.endX = a.preventGraphAnimation ? null : d.xMap, e.animate({
            d: d
          })) : d.length && (a[k] = a.chart.renderer.path(d).addClass(c[1]).attr({
              zIndex: 1
            }).add(a.group),
            e = {
              stroke: c[2],
              "stroke-width": b.lineWidth,
              fill: a.fillGraph && a.color || "none"
            }, c[3] ? e.dashstyle = c[3] : "square" !== b.linecap && (e["stroke-linecap"] = e["stroke-linejoin"] = "round"), e = a[k].attr(e).shadow(2 > f && b.shadow));
          e && (e.startX = d.xMap, e.isArea = d.isArea)
        })
      },
      getZonesGraphs: function(a) {
        u(this.zones, function(b, d) {
          a.push(["zone-graph-" + d, "highcharts-graph highcharts-zone-graph-" + d + " " + (b.className || ""), b.color || this.color, b.dashStyle || this.options.dashStyle])
        }, this);
        return a
      },
      applyZones: function() {
        var a = this,
          b = this.chart,
          d = b.renderer,
          c = this.zones,
          f, k, e = this.clips || [],
          h, q = this.graph,
          l = this.area,
          r = Math.max(b.chartWidth, b.chartHeight),
          g = this[(this.zoneAxis || "y") + "Axis"],
          n, t, F = b.inverted,
          D, m, J, p, v = !1;
        c.length && (q || l) && g && void 0 !== g.min && (t = g.reversed, D = g.horiz, q && !this.showLine && q.hide(), l && l.hide(), n = g.getExtremes(), u(c, function(c, x) {
          f = t ? D ? b.plotWidth : 0 : D ? 0 : g.toPixels(n.min);
          f = Math.min(Math.max(w(k, f), 0), r);
          k = Math.min(Math.max(Math.round(g.toPixels(w(c.value, n.max), !0)), 0), r);
          v && (f = k = g.toPixels(n.max));
          m = Math.abs(f - k);
          J = Math.min(f, k);
          p = Math.max(f, k);
          g.isXAxis ? (h = {
            x: F ? p : J,
            y: 0,
            width: m,
            height: r
          }, D || (h.x = b.plotHeight - h.x)) : (h = {
            x: 0,
            y: F ? p : J,
            width: r,
            height: m
          }, D && (h.y = b.plotWidth - h.y));
          F && d.isVML && (h = g.isXAxis ? {
            x: 0,
            y: t ? J : p,
            height: h.width,
            width: b.chartWidth
          } : {
            x: h.y - b.plotLeft - b.spacingBox.x,
            y: 0,
            width: h.height,
            height: b.chartHeight
          });
          e[x] ? e[x].animate(h) : (e[x] = d.clipRect(h), q && a["zone-graph-" + x].clip(e[x]), l && a["zone-area-" + x].clip(e[x]));
          v = c.value > n.max;
          a.resetZones && 0 === k && (k = void 0)
        }), this.clips = e)
      },
      invertGroups: function(a) {
        function b() {
          u(["group",
            "markerGroup"
          ], function(b) {
            d[b] && (c.renderer.isVML && d[b].attr({
              width: d.yAxis.len,
              height: d.xAxis.len
            }), d[b].width = d.yAxis.len, d[b].height = d.xAxis.len, d[b].invert(a))
          })
        }
        var d = this,
          c = d.chart,
          f;
        d.xAxis && (f = B(c, "resize", b), B(d, "destroy", f), b(a), d.invertGroups = b)
      },
      plotGroup: function(a, b, d, c, f) {
        var k = this[a],
          e = !k;
        e && (this[a] = k = this.chart.renderer.g().attr({
          zIndex: c || .1
        }).add(f));
        k.addClass("highcharts-" + b + " highcharts-series-" + this.index + " highcharts-" + this.type + "-series " + (z(this.colorIndex) ? "highcharts-color-" +
          this.colorIndex + " " : "") + (this.options.className || "") + (k.hasClass("highcharts-tracker") ? " highcharts-tracker" : ""), !0);
        k.attr({
          visibility: d
        })[e ? "attr" : "animate"](this.getPlotBox());
        return k
      },
      getPlotBox: function() {
        var a = this.chart,
          b = this.xAxis,
          d = this.yAxis;
        a.inverted && (b = d, d = this.xAxis);
        return {
          translateX: b ? b.left : a.plotLeft,
          translateY: d ? d.top : a.plotTop,
          scaleX: 1,
          scaleY: 1
        }
      },
      render: function() {
        var a = this,
          c = a.chart,
          d, f = a.options,
          e = !!a.animate && c.renderer.isSVG && C(f.animation).duration,
          k = a.visible ? "inherit" :
          "hidden",
          h = f.zIndex,
          l = a.hasRendered,
          r = c.seriesGroup,
          g = c.inverted;
        d = a.plotGroup("group", "series", k, h, r);
        a.markerGroup = a.plotGroup("markerGroup", "markers", k, h, r);
        e && a.animate(!0);
        d.inverted = a.isCartesian ? g : !1;
        a.drawGraph && (a.drawGraph(), a.applyZones());
        a.drawDataLabels && a.drawDataLabels();
        a.visible && a.drawPoints();
        a.drawTracker && !1 !== a.options.enableMouseTracking && a.drawTracker();
        a.invertGroups(g);
        !1 === f.clip || a.sharedClipKey || l || d.clip(c.clipRect);
        e && a.animate();
        l || (a.animationTimeout = q(function() {
            a.afterAnimate()
          },
          e));
        a.isDirty = !1;
        a.hasRendered = !0;
        b(a, "afterRender")
      },
      redraw: function() {
        var a = this.chart,
          b = this.isDirty || this.isDirtyData,
          d = this.group,
          c = this.xAxis,
          f = this.yAxis;
        d && (a.inverted && d.attr({
          width: a.plotWidth,
          height: a.plotHeight
        }), d.animate({
          translateX: w(c && c.left, a.plotLeft),
          translateY: w(f && f.top, a.plotTop)
        }));
        this.translate();
        this.render();
        b && delete this.kdTree
      },
      kdAxisArray: ["clientX", "plotY"],
      searchPoint: function(a, b) {
        var d = this.xAxis,
          c = this.yAxis,
          f = this.chart.inverted;
        return this.searchKDTree({
          clientX: f ?
            d.len - a.chartY + d.pos : a.chartX - d.pos,
          plotY: f ? c.len - a.chartX + c.pos : a.chartY - c.pos
        }, b)
      },
      buildKDTree: function() {
        function a(d, c, f) {
          var k, e;
          if (e = d && d.length) return k = b.kdAxisArray[c % f], d.sort(function(a, b) {
            return a[k] - b[k]
          }), e = Math.floor(e / 2), {
            point: d[e],
            left: a(d.slice(0, e), c + 1, f),
            right: a(d.slice(e + 1), c + 1, f)
          }
        }
        this.buildingKdTree = !0;
        var b = this,
          d = -1 < b.options.findNearestPointBy.indexOf("y") ? 2 : 1;
        delete b.kdTree;
        q(function() {
            b.kdTree = a(b.getValidPoints(null, !b.directTouch), d, d);
            b.buildingKdTree = !1
          }, b.options.kdNow ?
          0 : 1)
      },
      searchKDTree: function(a, b) {
        function d(a, b, h, q) {
          var l = b.point,
            r = c.kdAxisArray[h % q],
            g, n, t = l;
          n = z(a[f]) && z(l[f]) ? Math.pow(a[f] - l[f], 2) : null;
          g = z(a[k]) && z(l[k]) ? Math.pow(a[k] - l[k], 2) : null;
          g = (n || 0) + (g || 0);
          l.dist = z(g) ? Math.sqrt(g) : Number.MAX_VALUE;
          l.distX = z(n) ? Math.sqrt(n) : Number.MAX_VALUE;
          r = a[r] - l[r];
          g = 0 > r ? "left" : "right";
          n = 0 > r ? "right" : "left";
          b[g] && (g = d(a, b[g], h + 1, q), t = g[e] < t[e] ? g : l);
          b[n] && Math.sqrt(r * r) < t[e] && (a = d(a, b[n], h + 1, q), t = a[e] < t[e] ? a : t);
          return t
        }
        var c = this,
          f = this.kdAxisArray[0],
          k = this.kdAxisArray[1],
          e = b ? "distX" : "dist";
        b = -1 < c.options.findNearestPointBy.indexOf("y") ? 2 : 1;
        this.kdTree || this.buildingKdTree || this.buildKDTree();
        if (this.kdTree) return d(a, this.kdTree, b, b)
      }
    })
  })(L);
  (function(a) {
    var B = a.Axis,
      C = a.Chart,
      G = a.correctFloat,
      p = a.defined,
      m = a.destroyObjectProperties,
      g = a.each,
      v = a.format,
      z = a.objectEach,
      u = a.pick,
      y = a.Series;
    a.StackItem = function(a, b, e, g, n) {
      var f = a.chart.inverted;
      this.axis = a;
      this.isNegative = e;
      this.options = b;
      this.x = g;
      this.total = null;
      this.points = {};
      this.stack = n;
      this.rightCliff = this.leftCliff =
        0;
      this.alignOptions = {
        align: b.align || (f ? e ? "left" : "right" : "center"),
        verticalAlign: b.verticalAlign || (f ? "middle" : e ? "bottom" : "top"),
        y: u(b.y, f ? 4 : e ? 14 : -6),
        x: u(b.x, f ? e ? -6 : 6 : 0)
      };
      this.textAlign = b.textAlign || (f ? e ? "right" : "left" : "center")
    };
    a.StackItem.prototype = {
      destroy: function() {
        m(this, this.axis)
      },
      render: function(a) {
        var b = this.axis.chart,
          e = this.options,
          l = e.format,
          l = l ? v(l, this, b.time) : e.formatter.call(this);
        this.label ? this.label.attr({
          text: l,
          visibility: "hidden"
        }) : this.label = b.renderer.text(l, null, null, e.useHTML).css(e.style).attr({
          align: this.textAlign,
          rotation: e.rotation,
          visibility: "hidden"
        }).add(a)
      },
      setOffset: function(a, b) {
        var e = this.axis,
          l = e.chart,
          g = e.translate(e.usePercentage ? 100 : this.total, 0, 0, 0, 1),
          f = e.translate(0),
          f = Math.abs(g - f);
        a = l.xAxis[0].translate(this.x) + a;
        e = this.getStackBox(l, this, a, g, b, f, e);
        if (b = this.label) b.align(this.alignOptions, null, e), e = b.alignAttr, b[!1 === this.options.crop || l.isInsidePlot(e.x, e.y) ? "show" : "hide"](!0)
      },
      getStackBox: function(a, b, e, g, n, f, c) {
        var h = b.axis.reversed,
          l = a.inverted;
        a = c.height + c.pos - a.plotTop;
        b = b.isNegative &&
          !h || !b.isNegative && h;
        return {
          x: l ? b ? g : g - f : e,
          y: l ? a - e - n : b ? a - g - f : a - g,
          width: l ? f : n,
          height: l ? n : f
        }
      }
    };
    C.prototype.getStacks = function() {
      var a = this;
      g(a.yAxis, function(a) {
        a.stacks && a.hasVisibleSeries && (a.oldStacks = a.stacks)
      });
      g(a.series, function(b) {
        !b.options.stacking || !0 !== b.visible && !1 !== a.options.chart.ignoreHiddenSeries || (b.stackKey = b.type + u(b.options.stack, ""))
      })
    };
    B.prototype.buildStacks = function() {
      var a = this.series,
        b = u(this.options.reversedStacks, !0),
        e = a.length,
        g;
      if (!this.isXAxis) {
        this.usePercentage = !1;
        for (g = e; g--;) a[b ? g : e - g - 1].setStackedPoints();
        for (g = 0; g < e; g++) a[g].modifyStacks()
      }
    };
    B.prototype.renderStackTotals = function() {
      var a = this.chart,
        b = a.renderer,
        e = this.stacks,
        g = this.stackTotalGroup;
      g || (this.stackTotalGroup = g = b.g("stack-labels").attr({
        visibility: "visible",
        zIndex: 6
      }).add());
      g.translate(a.plotLeft, a.plotTop);
      z(e, function(a) {
        z(a, function(a) {
          a.render(g)
        })
      })
    };
    B.prototype.resetStacks = function() {
      var a = this,
        b = a.stacks;
      a.isXAxis || z(b, function(b) {
        z(b, function(e, l) {
          e.touched < a.stacksTouched ? (e.destroy(),
            delete b[l]) : (e.total = null, e.cumulative = null)
        })
      })
    };
    B.prototype.cleanStacks = function() {
      var a;
      this.isXAxis || (this.oldStacks && (a = this.stacks = this.oldStacks), z(a, function(a) {
        z(a, function(a) {
          a.cumulative = a.total
        })
      }))
    };
    y.prototype.setStackedPoints = function() {
      if (this.options.stacking && (!0 === this.visible || !1 === this.chart.options.chart.ignoreHiddenSeries)) {
        var l = this.processedXData,
          b = this.processedYData,
          e = [],
          g = b.length,
          n = this.options,
          f = n.threshold,
          c = u(n.startFromThreshold && f, 0),
          h = n.stack,
          n = n.stacking,
          w = this.stackKey,
          D = "-" + w,
          r = this.negStacks,
          m = this.yAxis,
          q = m.stacks,
          F = m.oldStacks,
          x, v, d, H, E, k, A;
        m.stacksTouched += 1;
        for (E = 0; E < g; E++) k = l[E], A = b[E], x = this.getStackIndicator(x, k, this.index), H = x.key, d = (v = r && A < (c ? 0 : f)) ? D : w, q[d] || (q[d] = {}), q[d][k] || (F[d] && F[d][k] ? (q[d][k] = F[d][k], q[d][k].total = null) : q[d][k] = new a.StackItem(m, m.options.stackLabels, v, k, h)), d = q[d][k], null !== A ? (d.points[H] = d.points[this.index] = [u(d.cumulative, c)], p(d.cumulative) || (d.base = H), d.touched = m.stacksTouched, 0 < x.index && !1 === this.singleStacks && (d.points[H][0] =
          d.points[this.index + "," + k + ",0"][0])) : d.points[H] = d.points[this.index] = null, "percent" === n ? (v = v ? w : D, r && q[v] && q[v][k] ? (v = q[v][k], d.total = v.total = Math.max(v.total, d.total) + Math.abs(A) || 0) : d.total = G(d.total + (Math.abs(A) || 0))) : d.total = G(d.total + (A || 0)), d.cumulative = u(d.cumulative, c) + (A || 0), null !== A && (d.points[H].push(d.cumulative), e[E] = d.cumulative);
        "percent" === n && (m.usePercentage = !0);
        this.stackedYData = e;
        m.oldStacks = {}
      }
    };
    y.prototype.modifyStacks = function() {
      var a = this,
        b = a.stackKey,
        e = a.yAxis.stacks,
        t = a.processedXData,
        n, f = a.options.stacking;
      a[f + "Stacker"] && g([b, "-" + b], function(b) {
        for (var c = t.length, l, g; c--;)
          if (l = t[c], n = a.getStackIndicator(n, l, a.index, b), g = (l = e[b] && e[b][l]) && l.points[n.key]) a[f + "Stacker"](g, l, c)
      })
    };
    y.prototype.percentStacker = function(a, b, e) {
      b = b.total ? 100 / b.total : 0;
      a[0] = G(a[0] * b);
      a[1] = G(a[1] * b);
      this.stackedYData[e] = a[1]
    };
    y.prototype.getStackIndicator = function(a, b, e, g) {
      !p(a) || a.x !== b || g && a.key !== g ? a = {
        x: b,
        index: 0,
        key: g
      } : a.index++;
      a.key = [e, b, a.index].join();
      return a
    }
  })(L);
  (function(a) {
    var B = a.addEvent,
      C = a.animate,
      G = a.Axis,
      p = a.createElement,
      m = a.css,
      g = a.defined,
      v = a.each,
      z = a.erase,
      u = a.extend,
      y = a.fireEvent,
      l = a.inArray,
      b = a.isNumber,
      e = a.isObject,
      t = a.isArray,
      n = a.merge,
      f = a.objectEach,
      c = a.pick,
      h = a.Point,
      w = a.Series,
      D = a.seriesTypes,
      r = a.setAnimation,
      J = a.splat;
    u(a.Chart.prototype, {
      addSeries: function(a, b, f) {
        var e, d = this;
        a && (b = c(b, !0), y(d, "addSeries", {
          options: a
        }, function() {
          e = d.initSeries(a);
          d.isDirtyLegend = !0;
          d.linkSeries();
          y(d, "afterAddSeries");
          b && d.redraw(f)
        }));
        return e
      },
      addAxis: function(a, b, f, e) {
        var d = b ? "xAxis" :
          "yAxis",
          h = this.options;
        a = n(a, {
          index: this[d].length,
          isX: b
        });
        b = new G(this, a);
        h[d] = J(h[d] || {});
        h[d].push(a);
        c(f, !0) && this.redraw(e);
        return b
      },
      showLoading: function(a) {
        var b = this,
          c = b.options,
          f = b.loadingDiv,
          d = c.loading,
          e = function() {
            f && m(f, {
              left: b.plotLeft + "px",
              top: b.plotTop + "px",
              width: b.plotWidth + "px",
              height: b.plotHeight + "px"
            })
          };
        f || (b.loadingDiv = f = p("div", {
          className: "highcharts-loading highcharts-loading-hidden"
        }, null, b.container), b.loadingSpan = p("span", {
          className: "highcharts-loading-inner"
        }, null, f), B(b,
          "redraw", e));
        f.className = "highcharts-loading";
        b.loadingSpan.innerHTML = a || c.lang.loading;
        m(f, u(d.style, {
          zIndex: 10
        }));
        m(b.loadingSpan, d.labelStyle);
        b.loadingShown || (m(f, {
          opacity: 0,
          display: ""
        }), C(f, {
          opacity: d.style.opacity || .5
        }, {
          duration: d.showDuration || 0
        }));
        b.loadingShown = !0;
        e()
      },
      hideLoading: function() {
        var a = this.options,
          b = this.loadingDiv;
        b && (b.className = "highcharts-loading highcharts-loading-hidden", C(b, {
          opacity: 0
        }, {
          duration: a.loading.hideDuration || 100,
          complete: function() {
            m(b, {
              display: "none"
            })
          }
        }));
        this.loadingShown = !1
      },
      propsRequireDirtyBox: "backgroundColor borderColor borderWidth margin marginTop marginRight marginBottom marginLeft spacing spacingTop spacingRight spacingBottom spacingLeft borderRadius plotBackgroundColor plotBackgroundImage plotBorderColor plotBorderWidth plotShadow shadow".split(" "),
      propsRequireUpdateSeries: "chart.inverted chart.polar chart.ignoreHiddenSeries chart.type colors plotOptions time tooltip".split(" "),
      update: function(a, e, h, r) {
        var d = this,
          q = {
            credits: "addCredits",
            title: "setTitle",
            subtitle: "setSubtitle"
          },
          x = a.chart,
          k, t, w = [];
        y(d, "update", {
          options: a
        });
        if (x) {
          n(!0, d.options.chart, x);
          "className" in x && d.setClassName(x.className);
          "reflow" in x && d.setReflow(x.reflow);
          if ("inverted" in x || "polar" in x) d.propFromSeries(), k = !0;
          "alignTicks" in x && (k = !0);
          f(x, function(a, b) {
            -1 !== l("chart." + b, d.propsRequireUpdateSeries) && (t = !0); - 1 !== l(b, d.propsRequireDirtyBox) && (d.isDirtyBox = !0)
          });
          "style" in x && d.renderer.setStyle(x.style)
        }
        a.colors && (this.options.colors = a.colors);
        a.plotOptions &&
          n(!0, this.options.plotOptions, a.plotOptions);
        f(a, function(a, b) {
          if (d[b] && "function" === typeof d[b].update) d[b].update(a, !1);
          else if ("function" === typeof d[q[b]]) d[q[b]](a);
          "chart" !== b && -1 !== l(b, d.propsRequireUpdateSeries) && (t = !0)
        });
        v("xAxis yAxis zAxis series colorAxis pane".split(" "), function(b) {
          a[b] && (v(J(a[b]), function(a, c) {
            (c = g(a.id) && d.get(a.id) || d[b][c]) && c.coll === b && (c.update(a, !1), h && (c.touched = !0));
            if (!c && h)
              if ("series" === b) d.addSeries(a, !1).touched = !0;
              else if ("xAxis" === b || "yAxis" === b) d.addAxis(a,
              "xAxis" === b, !1).touched = !0
          }), h && v(d[b], function(a) {
            a.touched ? delete a.touched : w.push(a)
          }))
        });
        v(w, function(a) {
          a.remove(!1)
        });
        k && v(d.axes, function(a) {
          a.update({}, !1)
        });
        t && v(d.series, function(a) {
          a.update({}, !1)
        });
        a.loading && n(!0, d.options.loading, a.loading);
        k = x && x.width;
        x = x && x.height;
        b(k) && k !== d.chartWidth || b(x) && x !== d.chartHeight ? d.setSize(k, x, r) : c(e, !0) && d.redraw(r)
      },
      setSubtitle: function(a) {
        this.setTitle(void 0, a)
      }
    });
    u(h.prototype, {
      update: function(a, b, f, h) {
        function d() {
          q.applyOptions(a);
          null === q.y &&
            k && (q.graphic = k.destroy());
          e(a, !0) && (k && k.element && a && a.marker && void 0 !== a.marker.symbol && (q.graphic = k.destroy()), a && a.dataLabels && q.dataLabel && (q.dataLabel = q.dataLabel.destroy()), q.connector && (q.connector = q.connector.destroy()));
          g = q.index;
          l.updateParallelArrays(q, g);
          n.data[g] = e(n.data[g], !0) || e(a, !0) ? q.options : c(a, n.data[g]);
          l.isDirty = l.isDirtyData = !0;
          !l.fixedBox && l.hasCartesianSeries && (r.isDirtyBox = !0);
          "point" === n.legendType && (r.isDirtyLegend = !0);
          b && r.redraw(f)
        }
        var q = this,
          l = q.series,
          k = q.graphic,
          g, r = l.chart,
          n = l.options;
        b = c(b, !0);
        !1 === h ? d() : q.firePointEvent("update", {
          options: a
        }, d)
      },
      remove: function(a, b) {
        this.series.removePoint(l(this, this.series.data), a, b)
      }
    });
    u(w.prototype, {
      addPoint: function(a, b, f, e) {
        var d = this.options,
          h = this.data,
          q = this.chart,
          k = this.xAxis,
          k = k && k.hasNames && k.names,
          l = d.data,
          g, r, n = this.xData,
          x, t;
        b = c(b, !0);
        g = {
          series: this
        };
        this.pointClass.prototype.applyOptions.apply(g, [a]);
        t = g.x;
        x = n.length;
        if (this.requireSorting && t < n[x - 1])
          for (r = !0; x && n[x - 1] > t;) x--;
        this.updateParallelArrays(g,
          "splice", x, 0, 0);
        this.updateParallelArrays(g, x);
        k && g.name && (k[t] = g.name);
        l.splice(x, 0, a);
        r && (this.data.splice(x, 0, null), this.processData());
        "point" === d.legendType && this.generatePoints();
        f && (h[0] && h[0].remove ? h[0].remove(!1) : (h.shift(), this.updateParallelArrays(g, "shift"), l.shift()));
        this.isDirtyData = this.isDirty = !0;
        b && q.redraw(e)
      },
      removePoint: function(a, b, f) {
        var e = this,
          d = e.data,
          h = d[a],
          q = e.points,
          k = e.chart,
          l = function() {
            q && q.length === d.length && q.splice(a, 1);
            d.splice(a, 1);
            e.options.data.splice(a, 1);
            e.updateParallelArrays(h || {
              series: e
            }, "splice", a, 1);
            h && h.destroy();
            e.isDirty = !0;
            e.isDirtyData = !0;
            b && k.redraw()
          };
        r(f, k);
        b = c(b, !0);
        h ? h.firePointEvent("remove", null, l) : l()
      },
      remove: function(a, b, f) {
        function e() {
          d.destroy();
          h.isDirtyLegend = h.isDirtyBox = !0;
          h.linkSeries();
          c(a, !0) && h.redraw(b)
        }
        var d = this,
          h = d.chart;
        !1 !== f ? y(d, "remove", null, e) : e()
      },
      update: function(b, f) {
        var e = this,
          h = e.chart,
          d = e.userOptions,
          q = e.oldType || e.type,
          g = b.type || d.type || h.options.chart.type,
          k = D[q].prototype,
          r, t = ["group", "markerGroup", "dataLabelsGroup"],
          w = ["navigatorSeries",
            "baseSeries"
          ],
          m = e.finishedAnimating && {
            animation: !1
          },
          F = ["data", "name", "turboThreshold"],
          J = a.keys(b),
          p = 0 < J.length;
        v(J, function(a) {
          -1 === l(a, F) && (p = !1)
        });
        if (p) b.data && this.setData(b.data, !1), b.name && this.setName(b.name, !1);
        else {
          w = t.concat(w);
          v(w, function(a) {
            w[a] = e[a];
            delete e[a]
          });
          b = n(d, m, {
            index: e.index,
            pointStart: c(d.pointStart, e.xData[0])
          }, {
            data: e.options.data
          }, b);
          e.remove(!1, null, !1);
          for (r in k) e[r] = void 0;
          D[g || q] ? u(e, D[g || q].prototype) : a.error(17, !0);
          v(w, function(a) {
            e[a] = w[a]
          });
          e.init(h, b);
          b.zIndex !==
            d.zIndex && v(t, function(a) {
              e[a] && e[a].attr({
                zIndex: b.zIndex
              })
            });
          e.oldType = q;
          h.linkSeries()
        }
        y(this, "afterUpdate");
        c(f, !0) && h.redraw(!1)
      },
      setName: function(a) {
        this.name = this.options.name = this.userOptions.name = a;
        this.chart.isDirtyLegend = !0
      }
    });
    u(G.prototype, {
      update: function(a, b) {
        var f = this.chart;
        a = n(this.userOptions, a);
        f.options[this.coll].indexOf && (f.options[this.coll][f.options[this.coll].indexOf(this.userOptions)] = a);
        this.destroy(!0);
        this.init(f, u(a, {
          events: void 0
        }));
        f.isDirtyBox = !0;
        c(b, !0) && f.redraw()
      },
      remove: function(a) {
        for (var b = this.chart, f = this.coll, e = this.series, d = e.length; d--;) e[d] && e[d].remove(!1);
        z(b.axes, this);
        z(b[f], this);
        t(b.options[f]) ? b.options[f].splice(this.options.index, 1) : delete b.options[f];
        v(b[f], function(a, b) {
          a.options.index = a.userOptions.index = b
        });
        this.destroy();
        b.isDirtyBox = !0;
        c(a, !0) && b.redraw()
      },
      setTitle: function(a, b) {
        this.update({
          title: a
        }, b)
      },
      setCategories: function(a, b) {
        this.update({
          categories: a
        }, b)
      }
    })
  })(L);
  (function(a) {
    var B = a.color,
      C = a.each,
      G = a.map,
      p = a.pick,
      m = a.Series,
      g = a.seriesType;
    g("area", "line", {
      softThreshold: !1,
      threshold: 0
    }, {
      singleStacks: !1,
      getStackPoints: function(g) {
        var m = [],
          u = [],
          v = this.xAxis,
          l = this.yAxis,
          b = l.stacks[this.stackKey],
          e = {},
          t = this.index,
          n = l.series,
          f = n.length,
          c, h = p(l.options.reversedStacks, !0) ? 1 : -1,
          w;
        g = g || this.points;
        if (this.options.stacking) {
          for (w = 0; w < g.length; w++) g[w].leftNull = g[w].rightNull = null, e[g[w].x] = g[w];
          a.objectEach(b, function(a, b) {
            null !== a.total && u.push(b)
          });
          u.sort(function(a, b) {
            return a - b
          });
          c = G(n, function() {
            return this.visible
          });
          C(u,
            function(a, g) {
              var r = 0,
                q, n;
              if (e[a] && !e[a].isNull) m.push(e[a]), C([-1, 1], function(l) {
                var r = 1 === l ? "rightNull" : "leftNull",
                  d = 0,
                  x = b[u[g + l]];
                if (x)
                  for (w = t; 0 <= w && w < f;) q = x.points[w], q || (w === t ? e[a][r] = !0 : c[w] && (n = b[a].points[w]) && (d -= n[1] - n[0])), w += h;
                e[a][1 === l ? "rightCliff" : "leftCliff"] = d
              });
              else {
                for (w = t; 0 <= w && w < f;) {
                  if (q = b[a].points[w]) {
                    r = q[1];
                    break
                  }
                  w += h
                }
                r = l.translate(r, 0, 1, 0, 1);
                m.push({
                  isNull: !0,
                  plotX: v.translate(a, 0, 0, 0, 1),
                  x: a,
                  plotY: r,
                  yBottom: r
                })
              }
            })
        }
        return m
      },
      getGraphPath: function(a) {
        var g = m.prototype.getGraphPath,
          u = this.options,
          v = u.stacking,
          l = this.yAxis,
          b, e, t = [],
          n = [],
          f = this.index,
          c, h = l.stacks[this.stackKey],
          w = u.threshold,
          D = l.getThreshold(u.threshold),
          r, u = u.connectNulls || "percent" === v,
          J = function(b, e, g) {
            var q = a[b];
            b = v && h[q.x].points[f];
            var d = q[g + "Null"] || 0;
            g = q[g + "Cliff"] || 0;
            var r, x, q = !0;
            g || d ? (r = (d ? b[0] : b[1]) + g, x = b[0] + g, q = !!d) : !v && a[e] && a[e].isNull && (r = x = w);
            void 0 !== r && (n.push({
              plotX: c,
              plotY: null === r ? D : l.getThreshold(r),
              isNull: q,
              isCliff: !0
            }), t.push({
              plotX: c,
              plotY: null === x ? D : l.getThreshold(x),
              doCurve: !1
            }))
          };
        a =
          a || this.points;
        v && (a = this.getStackPoints(a));
        for (b = 0; b < a.length; b++)
          if (e = a[b].isNull, c = p(a[b].rectPlotX, a[b].plotX), r = p(a[b].yBottom, D), !e || u) u || J(b, b - 1, "left"), e && !v && u || (n.push(a[b]), t.push({
            x: b,
            plotX: c,
            plotY: r
          })), u || J(b, b + 1, "right");
        b = g.call(this, n, !0, !0);
        t.reversed = !0;
        e = g.call(this, t, !0, !0);
        e.length && (e[0] = "L");
        e = b.concat(e);
        g = g.call(this, n, !1, u);
        e.xMap = b.xMap;
        this.areaPath = e;
        return g
      },
      drawGraph: function() {
        this.areaPath = [];
        m.prototype.drawGraph.apply(this);
        var a = this,
          g = this.areaPath,
          u = this.options,
          y = [
            ["area", "highcharts-area", this.color, u.fillColor]
          ];
        C(this.zones, function(g, b) {
          y.push(["zone-area-" + b, "highcharts-area highcharts-zone-area-" + b + " " + g.className, g.color || a.color, g.fillColor || u.fillColor])
        });
        C(y, function(l) {
          var b = l[0],
            e = a[b];
          e ? (e.endX = a.preventGraphAnimation ? null : g.xMap, e.animate({
            d: g
          })) : (e = a[b] = a.chart.renderer.path(g).addClass(l[1]).attr({
            fill: p(l[3], B(l[2]).setOpacity(p(u.fillOpacity, .75)).get()),
            zIndex: 0
          }).add(a.group), e.isArea = !0);
          e.startX = g.xMap;
          e.shiftUnit = u.step ? 2 : 1
        })
      },
      drawLegendSymbol: a.LegendSymbolMixin.drawRectangle
    })
  })(L);
  (function(a) {
    var B = a.pick;
    a = a.seriesType;
    a("spline", "line", {}, {
      getPointSpline: function(a, G, p) {
        var m = G.plotX,
          g = G.plotY,
          v = a[p - 1];
        p = a[p + 1];
        var z, u, y, l;
        if (v && !v.isNull && !1 !== v.doCurve && !G.isCliff && p && !p.isNull && !1 !== p.doCurve && !G.isCliff) {
          a = v.plotY;
          y = p.plotX;
          p = p.plotY;
          var b = 0;
          z = (1.5 * m + v.plotX) / 2.5;
          u = (1.5 * g + a) / 2.5;
          y = (1.5 * m + y) / 2.5;
          l = (1.5 * g + p) / 2.5;
          y !== z && (b = (l - u) * (y - m) / (y - z) + g - l);
          u += b;
          l += b;
          u > a && u > g ? (u = Math.max(a, g), l = 2 * g - u) : u < a && u < g && (u = Math.min(a, g), l = 2 * g - u);
          l > p && l > g ? (l = Math.max(p, g), u = 2 * g - l) : l < p && l < g &&
            (l = Math.min(p, g), u = 2 * g - l);
          G.rightContX = y;
          G.rightContY = l
        }
        G = ["C", B(v.rightContX, v.plotX), B(v.rightContY, v.plotY), B(z, m), B(u, g), m, g];
        v.rightContX = v.rightContY = null;
        return G
      }
    })
  })(L);
  (function(a) {
    var B = a.seriesTypes.area.prototype,
      C = a.seriesType;
    C("areaspline", "spline", a.defaultPlotOptions.area, {
      getStackPoints: B.getStackPoints,
      getGraphPath: B.getGraphPath,
      drawGraph: B.drawGraph,
      drawLegendSymbol: a.LegendSymbolMixin.drawRectangle
    })
  })(L);
  (function(a) {
    var B = a.animObject,
      C = a.color,
      G = a.each,
      p = a.extend,
      m = a.isNumber,
      g = a.merge,
      v = a.pick,
      z = a.Series,
      u = a.seriesType,
      y = a.svg;
    u("column", "line", {
      borderRadius: 0,
      crisp: !0,
      groupPadding: .2,
      marker: null,
      pointPadding: .1,
      minPointLength: 0,
      cropThreshold: 50,
      pointRange: null,
      states: {
        hover: {
          halo: !1,
          brightness: .1
        },
        select: {
          color: "#cccccc",
          borderColor: "#000000"
        }
      },
      dataLabels: {
        align: null,
        verticalAlign: null,
        y: null
      },
      softThreshold: !1,
      startFromThreshold: !0,
      stickyTracking: !1,
      tooltip: {
        distance: 6
      },
      threshold: 0,
      borderColor: "#ffffff"
    }, {
      cropShoulder: 0,
      directTouch: !0,
      trackerGroups: ["group", "dataLabelsGroup"],
      negStacks: !0,
      init: function() {
        z.prototype.init.apply(this, arguments);
        var a = this,
          b = a.chart;
        b.hasRendered && G(b.series, function(b) {
          b.type === a.type && (b.isDirty = !0)
        })
      },
      getColumnMetrics: function() {
        var a = this,
          b = a.options,
          e = a.xAxis,
          g = a.yAxis,
          n = e.reversed,
          f, c = {},
          h = 0;
        !1 === b.grouping ? h = 1 : G(a.chart.series, function(b) {
          var e = b.options,
            l = b.yAxis,
            r;
          b.type !== a.type || !b.visible && a.chart.options.chart.ignoreHiddenSeries || g.len !== l.len || g.pos !== l.pos || (e.stacking ? (f = b.stackKey, void 0 === c[f] && (c[f] = h++), r = c[f]) : !1 !== e.grouping &&
            (r = h++), b.columnIndex = r)
        });
        var w = Math.min(Math.abs(e.transA) * (e.ordinalSlope || b.pointRange || e.closestPointRange || e.tickInterval || 1), e.len),
          m = w * b.groupPadding,
          r = (w - 2 * m) / (h || 1),
          b = Math.min(b.maxPointWidth || e.len, v(b.pointWidth, r * (1 - 2 * b.pointPadding)));
        a.columnMetrics = {
          width: b,
          offset: (r - b) / 2 + (m + ((a.columnIndex || 0) + (n ? 1 : 0)) * r - w / 2) * (n ? -1 : 1)
        };
        return a.columnMetrics
      },
      crispCol: function(a, b, e, g) {
        var l = this.chart,
          f = this.borderWidth,
          c = -(f % 2 ? .5 : 0),
          f = f % 2 ? .5 : 1;
        l.inverted && l.renderer.isVML && (f += 1);
        this.options.crisp &&
          (e = Math.round(a + e) + c, a = Math.round(a) + c, e -= a);
        g = Math.round(b + g) + f;
        c = .5 >= Math.abs(b) && .5 < g;
        b = Math.round(b) + f;
        g -= b;
        c && g && (--b, g += 1);
        return {
          x: a,
          y: b,
          width: e,
          height: g
        }
      },
      translate: function() {
        var a = this,
          b = a.chart,
          e = a.options,
          g = a.dense = 2 > a.closestPointRange * a.xAxis.transA,
          g = a.borderWidth = v(e.borderWidth, g ? 0 : 1),
          n = a.yAxis,
          f = e.threshold,
          c = a.translatedThreshold = n.getThreshold(f),
          h = v(e.minPointLength, 5),
          w = a.getColumnMetrics(),
          m = w.width,
          r = a.barW = Math.max(m, 1 + 2 * g),
          J = a.pointXOffset = w.offset;
        b.inverted && (c -= .5);
        e.pointPadding &&
          (r = Math.ceil(r));
        z.prototype.translate.apply(a);
        G(a.points, function(e) {
          var g = v(e.yBottom, c),
            q = 999 + Math.abs(g),
            q = Math.min(Math.max(-q, e.plotY), n.len + q),
            l = e.plotX + J,
            d = r,
            t = Math.min(q, g),
            w, k = Math.max(q, g) - t;
          h && Math.abs(k) < h && (k = h, w = !n.reversed && !e.negative || n.reversed && e.negative, e.y === f && a.dataMax <= f && n.min < f && (w = !w), t = Math.abs(t - c) > h ? g - h : c - (w ? h : 0));
          e.barX = l;
          e.pointWidth = m;
          e.tooltipPos = b.inverted ? [n.len + n.pos - b.plotLeft - q, a.xAxis.len - l - d / 2, k] : [l + d / 2, q + n.pos - b.plotTop, k];
          e.shapeType = "rect";
          e.shapeArgs =
            a.crispCol.apply(a, e.isNull ? [l, c, d, 0] : [l, t, d, k])
        })
      },
      getSymbol: a.noop,
      drawLegendSymbol: a.LegendSymbolMixin.drawRectangle,
      drawGraph: function() {
        this.group[this.dense ? "addClass" : "removeClass"]("highcharts-dense-data")
      },
      pointAttribs: function(a, b) {
        var e = this.options,
          l, n = this.pointAttrToOptions || {};
        l = n.stroke || "borderColor";
        var f = n["stroke-width"] || "borderWidth",
          c = a && a.color || this.color,
          h = a && a[l] || e[l] || this.color || c,
          w = a && a[f] || e[f] || this[f] || 0,
          n = e.dashStyle;
        a && this.zones.length && (c = a.getZone(), c = a.options.color ||
          c && c.color || this.color);
        b && (a = g(e.states[b], a.options.states && a.options.states[b] || {}), b = a.brightness, c = a.color || void 0 !== b && C(c).brighten(a.brightness).get() || c, h = a[l] || h, w = a[f] || w, n = a.dashStyle || n);
        l = {
          fill: c,
          stroke: h,
          "stroke-width": w
        };
        n && (l.dashstyle = n);
        return l
      },
      drawPoints: function() {
        var a = this,
          b = this.chart,
          e = a.options,
          t = b.renderer,
          n = e.animationLimit || 250,
          f;
        G(a.points, function(c) {
          var h = c.graphic,
            l = h && b.pointCount < n ? "animate" : "attr";
          if (m(c.plotY) && null !== c.y) {
            f = c.shapeArgs;
            if (h) h[l](g(f));
            else c.graphic =
              h = t[c.shapeType](f).add(c.group || a.group);
            e.borderRadius && h.attr({
              r: e.borderRadius
            });
            h[l](a.pointAttribs(c, c.selected && "select")).shadow(e.shadow, null, e.stacking && !e.borderRadius);
            h.addClass(c.getClassName(), !0)
          } else h && (c.graphic = h.destroy())
        })
      },
      animate: function(a) {
        var b = this,
          e = this.yAxis,
          g = b.options,
          l = this.chart.inverted,
          f = {},
          c = l ? "translateX" : "translateY",
          h;
        y && (a ? (f.scaleY = .001, a = Math.min(e.pos + e.len, Math.max(e.pos, e.toPixels(g.threshold))), l ? f.translateX = a - e.len : f.translateY = a, b.group.attr(f)) :
          (h = b.group.attr(c), b.group.animate({
            scaleY: 1
          }, p(B(b.options.animation), {
            step: function(a, g) {
              f[c] = h + g.pos * (e.pos - h);
              b.group.attr(f)
            }
          })), b.animate = null))
      },
      remove: function() {
        var a = this,
          b = a.chart;
        b.hasRendered && G(b.series, function(b) {
          b.type === a.type && (b.isDirty = !0)
        });
        z.prototype.remove.apply(a, arguments)
      }
    })
  })(L);
  (function(a) {
    a = a.seriesType;
    a("bar", "column", null, {
      inverted: !0
    })
  })(L);
  (function(a) {
    var B = a.Series;
    a = a.seriesType;
    a("scatter", "line", {
      lineWidth: 0,
      findNearestPointBy: "xy",
      marker: {
        enabled: !0
      },
      tooltip: {
        headerFormat: '\x3cspan style\x3d"color:{point.color}"\x3e\u25cf\x3c/span\x3e \x3cspan style\x3d"font-size: 0.85em"\x3e {series.name}\x3c/span\x3e\x3cbr/\x3e',
        pointFormat: "x: \x3cb\x3e{point.x}\x3c/b\x3e\x3cbr/\x3ey: \x3cb\x3e{point.y}\x3c/b\x3e\x3cbr/\x3e"
      }
    }, {
      sorted: !1,
      requireSorting: !1,
      noSharedTooltip: !0,
      trackerGroups: ["group", "markerGroup", "dataLabelsGroup"],
      takeOrdinalPosition: !1,
      drawGraph: function() {
        this.options.lineWidth && B.prototype.drawGraph.call(this)
      }
    })
  })(L);
  (function(a) {
    var B = a.deg2rad,
      C = a.isNumber,
      G = a.pick,
      p = a.relativeLength;
    a.CenteredSeriesMixin = {
      getCenter: function() {
        var a = this.options,
          g = this.chart,
          v = 2 * (a.slicedOffset || 0),
          z = g.plotWidth - 2 * v,
          g = g.plotHeight - 2 * v,
          u = a.center,
          u = [G(u[0], "50%"), G(u[1], "50%"), a.size || "100%", a.innerSize || 0],
          y = Math.min(z, g),
          l, b;
        for (l = 0; 4 > l; ++l) b = u[l], a = 2 > l || 2 === l && /%$/.test(b), u[l] = p(b, [z, g, y, u[2]][l]) + (a ? v : 0);
        u[3] > u[2] && (u[3] = u[2]);
        return u
      },
      getStartAndEndRadians: function(a, g) {
        a = C(a) ? a : 0;
        g = C(g) && g > a && 360 > g - a ? g : a + 360;
        return {
          start: B * (a + -90),
          end: B * (g + -90)
        }
      }
    }
  })(L);
  (function(a) {
    var B = a.addEvent,
      C = a.CenteredSeriesMixin,
      G = a.defined,
      p = a.each,
      m = a.extend,
      g = C.getStartAndEndRadians,
      v = a.inArray,
      z = a.noop,
      u = a.pick,
      y = a.Point,
      l = a.Series,
      b = a.seriesType,
      e = a.setAnimation;
    b("pie", "line", {
      center: [null, null],
      clip: !1,
      colorByPoint: !0,
      dataLabels: {
        distance: 30,
        enabled: !0,
        formatter: function() {
          return this.point.isNull ? void 0 : this.point.name
        },
        x: 0
      },
      ignoreHiddenPoint: !0,
      legendType: "point",
      marker: null,
      size: null,
      showInLegend: !1,
      slicedOffset: 10,
      stickyTracking: !1,
      tooltip: {
        followPointer: !0
      },
      borderColor: "#ffffff",
      borderWidth: 1,
      states: {
        hover: {
          brightness: .1
        }
      }
    }, {
      isCartesian: !1,
      requireSorting: !1,
      directTouch: !0,
      noSharedTooltip: !0,
      trackerGroups: ["group",
        "dataLabelsGroup"
      ],
      axisTypes: [],
      pointAttribs: a.seriesTypes.column.prototype.pointAttribs,
      animate: function(a) {
        var b = this,
          f = b.points,
          c = b.startAngleRad;
        a || (p(f, function(a) {
          var f = a.graphic,
            e = a.shapeArgs;
          f && (f.attr({
            r: a.startR || b.center[3] / 2,
            start: c,
            end: c
          }), f.animate({
            r: e.r,
            start: e.start,
            end: e.end
          }, b.options.animation))
        }), b.animate = null)
      },
      updateTotals: function() {
        var a, b = 0,
          f = this.points,
          c = f.length,
          e, g = this.options.ignoreHiddenPoint;
        for (a = 0; a < c; a++) e = f[a], b += g && !e.visible ? 0 : e.isNull ? 0 : e.y;
        this.total = b;
        for (a =
          0; a < c; a++) e = f[a], e.percentage = 0 < b && (e.visible || !g) ? e.y / b * 100 : 0, e.total = b
      },
      generatePoints: function() {
        l.prototype.generatePoints.call(this);
        this.updateTotals()
      },
      translate: function(a) {
        this.generatePoints();
        var b = 0,
          f = this.options,
          c = f.slicedOffset,
          e = c + (f.borderWidth || 0),
          l, m, r, t = g(f.startAngle, f.endAngle),
          q = this.startAngleRad = t.start,
          t = (this.endAngleRad = t.end) - q,
          F = this.points,
          x, p = f.dataLabels.distance,
          f = f.ignoreHiddenPoint,
          d, H = F.length,
          E;
        a || (this.center = a = this.getCenter());
        this.getX = function(b, d, c) {
          r = Math.asin(Math.min((b -
            a[1]) / (a[2] / 2 + c.labelDistance), 1));
          return a[0] + (d ? -1 : 1) * Math.cos(r) * (a[2] / 2 + c.labelDistance)
        };
        for (d = 0; d < H; d++) {
          E = F[d];
          E.labelDistance = u(E.options.dataLabels && E.options.dataLabels.distance, p);
          this.maxLabelDistance = Math.max(this.maxLabelDistance || 0, E.labelDistance);
          l = q + b * t;
          if (!f || E.visible) b += E.percentage / 100;
          m = q + b * t;
          E.shapeType = "arc";
          E.shapeArgs = {
            x: a[0],
            y: a[1],
            r: a[2] / 2,
            innerR: a[3] / 2,
            start: Math.round(1E3 * l) / 1E3,
            end: Math.round(1E3 * m) / 1E3
          };
          r = (m + l) / 2;
          r > 1.5 * Math.PI ? r -= 2 * Math.PI : r < -Math.PI / 2 && (r += 2 * Math.PI);
          E.slicedTranslation = {
            translateX: Math.round(Math.cos(r) * c),
            translateY: Math.round(Math.sin(r) * c)
          };
          m = Math.cos(r) * a[2] / 2;
          x = Math.sin(r) * a[2] / 2;
          E.tooltipPos = [a[0] + .7 * m, a[1] + .7 * x];
          E.half = r < -Math.PI / 2 || r > Math.PI / 2 ? 1 : 0;
          E.angle = r;
          l = Math.min(e, E.labelDistance / 5);
          E.labelPos = [a[0] + m + Math.cos(r) * E.labelDistance, a[1] + x + Math.sin(r) * E.labelDistance, a[0] + m + Math.cos(r) * l, a[1] + x + Math.sin(r) * l, a[0] + m, a[1] + x, 0 > E.labelDistance ? "center" : E.half ? "right" : "left", r]
        }
      },
      drawGraph: null,
      drawPoints: function() {
        var a = this,
          b = a.chart.renderer,
          f, c, e, g, l = a.options.shadow;
        l && !a.shadowGroup && (a.shadowGroup = b.g("shadow").add(a.group));
        p(a.points, function(h) {
          c = h.graphic;
          if (h.isNull) c && (h.graphic = c.destroy());
          else {
            g = h.shapeArgs;
            f = h.getTranslate();
            var r = h.shadowGroup;
            l && !r && (r = h.shadowGroup = b.g("shadow").add(a.shadowGroup));
            r && r.attr(f);
            e = a.pointAttribs(h, h.selected && "select");
            c ? c.setRadialReference(a.center).attr(e).animate(m(g, f)) : (h.graphic = c = b[h.shapeType](g).setRadialReference(a.center).attr(f).add(a.group), h.visible || c.attr({
                visibility: "hidden"
              }),
              c.attr(e).attr({
                "stroke-linejoin": "round"
              }).shadow(l, r));
            c.addClass(h.getClassName())
          }
        })
      },
      searchPoint: z,
      sortByAngle: function(a, b) {
        a.sort(function(a, c) {
          return void 0 !== a.angle && (c.angle - a.angle) * b
        })
      },
      drawLegendSymbol: a.LegendSymbolMixin.drawRectangle,
      getCenter: C.getCenter,
      getSymbol: z
    }, {
      init: function() {
        y.prototype.init.apply(this, arguments);
        var a = this,
          b;
        a.name = u(a.name, "Slice");
        b = function(b) {
          a.slice("select" === b.type)
        };
        B(a, "select", b);
        B(a, "unselect", b);
        return a
      },
      isValid: function() {
        return a.isNumber(this.y, !0) && 0 <= this.y
      },
      setVisible: function(a, b) {
        var f = this,
          c = f.series,
          e = c.chart,
          g = c.options.ignoreHiddenPoint;
        b = u(b, g);
        a !== f.visible && (f.visible = f.options.visible = a = void 0 === a ? !f.visible : a, c.options.data[v(f, c.data)] = f.options, p(["graphic", "dataLabel", "connector", "shadowGroup"], function(b) {
          if (f[b]) f[b][a ? "show" : "hide"](!0)
        }), f.legendItem && e.legend.colorizeItem(f, a), a || "hover" !== f.state || f.setState(""), g && (c.isDirty = !0), b && e.redraw())
      },
      slice: function(a, b, f) {
        var c = this.series;
        e(f, c.chart);
        u(b, !0);
        this.sliced =
          this.options.sliced = G(a) ? a : !this.sliced;
        c.options.data[v(this, c.data)] = this.options;
        this.graphic.animate(this.getTranslate());
        this.shadowGroup && this.shadowGroup.animate(this.getTranslate())
      },
      getTranslate: function() {
        return this.sliced ? this.slicedTranslation : {
          translateX: 0,
          translateY: 0
        }
      },
      haloPath: function(a) {
        var b = this.shapeArgs;
        return this.sliced || !this.visible ? [] : this.series.chart.renderer.symbols.arc(b.x, b.y, b.r + a, b.r + a, {
          innerR: this.shapeArgs.r - 1,
          start: b.start,
          end: b.end
        })
      }
    })
  })(L);
  (function(a) {
    var B =
      a.addEvent,
      C = a.arrayMax,
      G = a.defined,
      p = a.each,
      m = a.extend,
      g = a.format,
      v = a.map,
      z = a.merge,
      u = a.noop,
      y = a.pick,
      l = a.relativeLength,
      b = a.Series,
      e = a.seriesTypes,
      t = a.some,
      n = a.stableSort;
    a.distribute = function(b, c, e) {
      function f(a, b) {
        return a.target - b.target
      }
      var h, g = !0,
        l = b,
        q = [],
        m;
      m = 0;
      var x = l.reducedLen || c;
      for (h = b.length; h--;) m += b[h].size;
      if (m > x) {
        n(b, function(a, b) {
          return (b.rank || 0) - (a.rank || 0)
        });
        for (m = h = 0; m <= x;) m += b[h].size, h++;
        q = b.splice(h - 1, b.length)
      }
      n(b, f);
      for (b = v(b, function(a) {
          return {
            size: a.size,
            targets: [a.target],
            align: y(a.align, .5)
          }
        }); g;) {
        for (h = b.length; h--;) g = b[h], m = (Math.min.apply(0, g.targets) + Math.max.apply(0, g.targets)) / 2, g.pos = Math.min(Math.max(0, m - g.size * g.align), c - g.size);
        h = b.length;
        for (g = !1; h--;) 0 < h && b[h - 1].pos + b[h - 1].size > b[h].pos && (b[h - 1].size += b[h].size, b[h - 1].targets = b[h - 1].targets.concat(b[h].targets), b[h - 1].align = .5, b[h - 1].pos + b[h - 1].size > c && (b[h - 1].pos = c - b[h - 1].size), b.splice(h, 1), g = !0)
      }
      l.push.apply(l, q);
      h = 0;
      t(b, function(b) {
        var d = 0;
        if (t(b.targets, function() {
            l[h].pos = b.pos + d;
            if (Math.abs(l[h].pos -
                l[h].target) > e) return p(l.slice(0, h + 1), function(a) {
              delete a.pos
            }), l.reducedLen = (l.reducedLen || c) - .1 * c, l.reducedLen > .1 * c && a.distribute(l, c, e), !0;
            d += l[h].size;
            h++
          })) return !0
      });
      n(l, f)
    };
    b.prototype.drawDataLabels = function() {
      function b(a, b) {
        var d = b.filter;
        return d ? (b = d.operator, a = a[d.property], d = d.value, "\x3e" === b && a > d || "\x3c" === b && a < d || "\x3e\x3d" === b && a >= d || "\x3c\x3d" === b && a <= d || "\x3d\x3d" === b && a == d || "\x3d\x3d\x3d" === b && a === d ? !0 : !1) : !0
      }
      var c = this,
        e = c.chart,
        l = c.options,
        n = l.dataLabels,
        r = c.points,
        m, q, t =
        c.hasRendered || 0,
        x, u, d = y(n.defer, !!l.animation),
        H = e.renderer;
      if (n.enabled || c._hasPointLabels) c.dlProcessOptions && c.dlProcessOptions(n), u = c.plotGroup("dataLabelsGroup", "data-labels", d && !t ? "hidden" : "visible", n.zIndex || 6), d && (u.attr({
        opacity: +t
      }), t || B(c, "afterAnimate", function() {
        c.visible && u.show(!0);
        u[l.animation ? "animate" : "attr"]({
          opacity: 1
        }, {
          duration: 200
        })
      })), q = n, p(r, function(d) {
        var f, h = d.dataLabel,
          r, w, t = d.connector,
          F = !h,
          E;
        m = d.dlOptions || d.options && d.options.dataLabels;
        (f = y(m && m.enabled, q.enabled) &&
          !d.isNull) && (f = !0 === b(d, m || n));
        f && (n = z(q, m), r = d.getLabelConfig(), E = n[d.formatPrefix + "Format"] || n.format, x = G(E) ? g(E, r, e.time) : (n[d.formatPrefix + "Formatter"] || n.formatter).call(r, n), E = n.style, r = n.rotation, E.color = y(n.color, E.color, c.color, "#000000"), "contrast" === E.color && (d.contrastColor = H.getContrast(d.color || c.color), E.color = n.inside || 0 > y(d.labelDistance, n.distance) || l.stacking ? d.contrastColor : "#000000"), l.cursor && (E.cursor = l.cursor), w = {
          fill: n.backgroundColor,
          stroke: n.borderColor,
          "stroke-width": n.borderWidth,
          r: n.borderRadius || 0,
          rotation: r,
          padding: n.padding,
          zIndex: 1
        }, a.objectEach(w, function(a, b) {
          void 0 === a && delete w[b]
        }));
        !h || f && G(x) ? f && G(x) && (h ? w.text = x : (h = d.dataLabel = r ? H.text(x, 0, -9999).addClass("highcharts-data-label") : H.label(x, 0, -9999, n.shape, null, null, n.useHTML, null, "data-label"), h.addClass(" highcharts-data-label-color-" + d.colorIndex + " " + (n.className || "") + (n.useHTML ? "highcharts-tracker" : ""))), h.attr(w), h.css(E).shadow(n.shadow), h.added || h.add(u), c.alignDataLabel(d, h, n, null, F)) : (d.dataLabel = h = h.destroy(),
          t && (d.connector = t.destroy()))
      });
      a.fireEvent(this, "afterDrawDataLabels")
    };
    b.prototype.alignDataLabel = function(a, b, e, g, l) {
      var c = this.chart,
        f = c.inverted,
        h = y(a.dlBox && a.dlBox.centerX, a.plotX, -9999),
        n = y(a.plotY, -9999),
        x = b.getBBox(),
        w, d = e.rotation,
        t = e.align,
        E = this.visible && (a.series.forceDL || c.isInsidePlot(h, Math.round(n), f) || g && c.isInsidePlot(h, f ? g.x + 1 : g.y + g.height - 1, f)),
        k = "justify" === y(e.overflow, "justify");
      if (E && (w = e.style.fontSize, w = c.renderer.fontMetrics(w, b).b, g = m({
          x: f ? this.yAxis.len - n : h,
          y: Math.round(f ?
            this.xAxis.len - h : n),
          width: 0,
          height: 0
        }, g), m(e, {
          width: x.width,
          height: x.height
        }), d ? (k = !1, h = c.renderer.rotCorr(w, d), h = {
          x: g.x + e.x + g.width / 2 + h.x,
          y: g.y + e.y + {
            top: 0,
            middle: .5,
            bottom: 1
          }[e.verticalAlign] * g.height
        }, b[l ? "attr" : "animate"](h).attr({
          align: t
        }), n = (d + 720) % 360, n = 180 < n && 360 > n, "left" === t ? h.y -= n ? x.height : 0 : "center" === t ? (h.x -= x.width / 2, h.y -= x.height / 2) : "right" === t && (h.x -= x.width, h.y -= n ? 0 : x.height), b.placed = !0, b.alignAttr = h) : (b.align(e, null, g), h = b.alignAttr), k ? a.isLabelJustified = this.justifyDataLabel(b, e,
          h, x, g, l) : y(e.crop, !0) && (E = c.isInsidePlot(h.x, h.y) && c.isInsidePlot(h.x + x.width, h.y + x.height)), e.shape && !d)) b[l ? "attr" : "animate"]({
        anchorX: f ? c.plotWidth - a.plotY : a.plotX,
        anchorY: f ? c.plotHeight - a.plotX : a.plotY
      });
      E || (b.attr({
        y: -9999
      }), b.placed = !1)
    };
    b.prototype.justifyDataLabel = function(a, b, e, g, l, r) {
      var c = this.chart,
        f = b.align,
        h = b.verticalAlign,
        n, m, d = a.box ? 0 : a.padding || 0;
      n = e.x + d;
      0 > n && ("right" === f ? b.align = "left" : b.x = -n, m = !0);
      n = e.x + g.width - d;
      n > c.plotWidth && ("left" === f ? b.align = "right" : b.x = c.plotWidth - n, m = !0);
      n = e.y + d;
      0 > n && ("bottom" === h ? b.verticalAlign = "top" : b.y = -n, m = !0);
      n = e.y + g.height - d;
      n > c.plotHeight && ("top" === h ? b.verticalAlign = "bottom" : b.y = c.plotHeight - n, m = !0);
      m && (a.placed = !r, a.align(b, null, l));
      return m
    };
    e.pie && (e.pie.prototype.drawDataLabels = function() {
      var f = this,
        c = f.data,
        e, g = f.chart,
        l = f.options.dataLabels,
        r = y(l.connectorPadding, 10),
        n = y(l.connectorWidth, 1),
        q = g.plotWidth,
        m = g.plotHeight,
        x = Math.round(g.chartWidth / 3),
        t, d = f.center,
        H = d[2] / 2,
        E = d[1],
        k, A, u, v, z = [
          [],
          []
        ],
        B, N, M, S, O = [0, 0, 0, 0];
      f.visible && (l.enabled ||
        f._hasPointLabels) && (p(c, function(a) {
          a.dataLabel && a.visible && a.dataLabel.shortened && (a.dataLabel.attr({
            width: "auto"
          }).css({
            width: "auto",
            textOverflow: "clip"
          }), a.dataLabel.shortened = !1)
        }), b.prototype.drawDataLabels.apply(f), p(c, function(a) {
          a.dataLabel && a.visible && (z[a.half].push(a), a.dataLabel._pos = null, !G(l.style.width) && !G(a.options.dataLabels && a.options.dataLabels.style && a.options.dataLabels.style.width) && a.dataLabel.getBBox().width > x && (a.dataLabel.css({
            width: .7 * x
          }), a.dataLabel.shortened = !0))
        }),
        p(z, function(b, c) {
          var h, n, x = b.length,
            t = [],
            w;
          if (x)
            for (f.sortByAngle(b, c - .5), 0 < f.maxLabelDistance && (h = Math.max(0, E - H - f.maxLabelDistance), n = Math.min(E + H + f.maxLabelDistance, g.plotHeight), p(b, function(a) {
                0 < a.labelDistance && a.dataLabel && (a.top = Math.max(0, E - H - a.labelDistance), a.bottom = Math.min(E + H + a.labelDistance, g.plotHeight), w = a.dataLabel.getBBox().height || 21, a.positionsIndex = t.push({
                  target: a.labelPos[1] - a.top + w / 2,
                  size: w,
                  rank: a.y
                }) - 1)
              }), h = n + w - h, a.distribute(t, h, h / 5)), S = 0; S < x; S++) e = b[S], n = e.positionsIndex,
              u = e.labelPos, k = e.dataLabel, M = !1 === e.visible ? "hidden" : "inherit", N = h = u[1], t && G(t[n]) && (void 0 === t[n].pos ? M = "hidden" : (v = t[n].size, N = e.top + t[n].pos)), delete e.positionIndex, B = l.justify ? d[0] + (c ? -1 : 1) * (H + e.labelDistance) : f.getX(N < e.top + 2 || N > e.bottom - 2 ? h : N, c, e), k._attr = {
                visibility: M,
                align: u[6]
              }, k._pos = {
                x: B + l.x + ({
                  left: r,
                  right: -r
                }[u[6]] || 0),
                y: N + l.y - 10
              }, u.x = B, u.y = N, y(l.crop, !0) && (A = k.getBBox().width, h = null, B - A < r && 1 === c ? (h = Math.round(A - B + r), O[3] = Math.max(h, O[3])) : B + A > q - r && 0 === c && (h = Math.round(B + A - q + r), O[1] =
                Math.max(h, O[1])), 0 > N - v / 2 ? O[0] = Math.max(Math.round(-N + v / 2), O[0]) : N + v / 2 > m && (O[2] = Math.max(Math.round(N + v / 2 - m), O[2])), k.sideOverflow = h)
        }), 0 === C(O) || this.verifyDataLabelOverflow(O)) && (this.placeDataLabels(), n && p(this.points, function(a) {
        var b;
        t = a.connector;
        if ((k = a.dataLabel) && k._pos && a.visible && 0 < a.labelDistance) {
          M = k._attr.visibility;
          if (b = !t) a.connector = t = g.renderer.path().addClass("highcharts-data-label-connector  highcharts-color-" + a.colorIndex + (a.className ? " " + a.className : "")).add(f.dataLabelsGroup),
            t.attr({
              "stroke-width": n,
              stroke: l.connectorColor || a.color || "#666666"
            });
          t[b ? "attr" : "animate"]({
            d: f.connectorPath(a.labelPos)
          });
          t.attr("visibility", M)
        } else t && (a.connector = t.destroy())
      }))
    }, e.pie.prototype.connectorPath = function(a) {
      var b = a.x,
        f = a.y;
      return y(this.options.dataLabels.softConnector, !0) ? ["M", b + ("left" === a[6] ? 5 : -5), f, "C", b, f, 2 * a[2] - a[4], 2 * a[3] - a[5], a[2], a[3], "L", a[4], a[5]] : ["M", b + ("left" === a[6] ? 5 : -5), f, "L", a[2], a[3], "L", a[4], a[5]]
    }, e.pie.prototype.placeDataLabels = function() {
      p(this.points, function(a) {
        var b =
          a.dataLabel;
        b && a.visible && ((a = b._pos) ? (b.sideOverflow && (b._attr.width = b.getBBox().width - b.sideOverflow, b.css({
          width: b._attr.width + "px",
          textOverflow: this.options.dataLabels.style.textOverflow || "ellipsis"
        }), b.shortened = !0), b.attr(b._attr), b[b.moved ? "animate" : "attr"](a), b.moved = !0) : b && b.attr({
          y: -9999
        }))
      }, this)
    }, e.pie.prototype.alignDataLabel = u, e.pie.prototype.verifyDataLabelOverflow = function(a) {
      var b = this.center,
        e = this.options,
        f = e.center,
        g = e.minSize || 80,
        r, n = null !== e.size;
      n || (null !== f[0] ? r = Math.max(b[2] -
        Math.max(a[1], a[3]), g) : (r = Math.max(b[2] - a[1] - a[3], g), b[0] += (a[3] - a[1]) / 2), null !== f[1] ? r = Math.max(Math.min(r, b[2] - Math.max(a[0], a[2])), g) : (r = Math.max(Math.min(r, b[2] - a[0] - a[2]), g), b[1] += (a[0] - a[2]) / 2), r < b[2] ? (b[2] = r, b[3] = Math.min(l(e.innerSize || 0, r), r), this.translate(b), this.drawDataLabels && this.drawDataLabels()) : n = !0);
      return n
    });
    e.column && (e.column.prototype.alignDataLabel = function(a, c, e, g, l) {
      var f = this.chart.inverted,
        h = a.series,
        q = a.dlBox || a.shapeArgs,
        n = y(a.below, a.plotY > y(this.translatedThreshold,
          h.yAxis.len)),
        m = y(e.inside, !!this.options.stacking);
      q && (g = z(q), 0 > g.y && (g.height += g.y, g.y = 0), q = g.y + g.height - h.yAxis.len, 0 < q && (g.height -= q), f && (g = {
        x: h.yAxis.len - g.y - g.height,
        y: h.xAxis.len - g.x - g.width,
        width: g.height,
        height: g.width
      }), m || (f ? (g.x += n ? 0 : g.width, g.width = 0) : (g.y += n ? g.height : 0, g.height = 0)));
      e.align = y(e.align, !f || m ? "center" : n ? "right" : "left");
      e.verticalAlign = y(e.verticalAlign, f || m ? "middle" : n ? "top" : "bottom");
      b.prototype.alignDataLabel.call(this, a, c, e, g, l);
      a.isLabelJustified && a.contrastColor && a.dataLabel.css({
        color: a.contrastColor
      })
    })
  })(L);
  (function(a) {
    var B = a.Chart,
      C = a.each,
      G = a.objectEach,
      p = a.pick;
    a = a.addEvent;
    a(B, "render", function() {
      var a = [];
      C(this.labelCollectors || [], function(g) {
        a = a.concat(g())
      });
      C(this.yAxis || [], function(g) {
        g.options.stackLabels && !g.options.stackLabels.allowOverlap && G(g.stacks, function(g) {
          G(g, function(g) {
            a.push(g.label)
          })
        })
      });
      C(this.series || [], function(g) {
        var m = g.options.dataLabels,
          z = g.dataLabelCollections || ["dataLabel"];
        (m.enabled || g._hasPointLabels) && !m.allowOverlap && g.visible && C(z, function(m) {
          C(g.points, function(g) {
            g[m] &&
              (g[m].labelrank = p(g.labelrank, g.shapeArgs && g.shapeArgs.height), a.push(g[m]))
          })
        })
      });
      this.hideOverlappingLabels(a)
    });
    B.prototype.hideOverlappingLabels = function(a) {
      var g = a.length,
        m, p, u, y, l, b, e, t, n, f = function(a, b, e, f, g, l, q, n) {
          return !(g > a + e || g + q < a || l > b + f || l + n < b)
        };
      for (p = 0; p < g; p++)
        if (m = a[p]) m.oldOpacity = m.opacity, m.newOpacity = 1, m.width || (u = m.getBBox(), m.width = u.width, m.height = u.height);
      a.sort(function(a, b) {
        return (b.labelrank || 0) - (a.labelrank || 0)
      });
      for (p = 0; p < g; p++)
        for (u = a[p], m = p + 1; m < g; ++m)
          if (y = a[m], u && y &&
            u !== y && u.placed && y.placed && 0 !== u.newOpacity && 0 !== y.newOpacity && (l = u.alignAttr, b = y.alignAttr, e = u.parentGroup, t = y.parentGroup, n = 2 * (u.box ? 0 : u.padding || 0), l = f(l.x + e.translateX, l.y + e.translateY, u.width - n, u.height - n, b.x + t.translateX, b.y + t.translateY, y.width - n, y.height - n)))(u.labelrank < y.labelrank ? u : y).newOpacity = 0;
      C(a, function(a) {
        var b, c;
        a && (c = a.newOpacity, a.oldOpacity !== c && a.placed && (c ? a.show(!0) : b = function() {
          a.hide()
        }, a.alignAttr.opacity = c, a[a.isOld ? "animate" : "attr"](a.alignAttr, null, b)), a.isOld = !0)
      })
    }
  })(L);
  (function(a) {
    var B = a.addEvent,
      C = a.Chart,
      G = a.createElement,
      p = a.css,
      m = a.defaultOptions,
      g = a.defaultPlotOptions,
      v = a.each,
      z = a.extend,
      u = a.fireEvent,
      y = a.hasTouch,
      l = a.inArray,
      b = a.isObject,
      e = a.Legend,
      t = a.merge,
      n = a.pick,
      f = a.Point,
      c = a.Series,
      h = a.seriesTypes,
      w = a.svg,
      D;
    D = a.TrackerMixin = {
      drawTrackerPoint: function() {
        var a = this,
          b = a.chart.pointer,
          c = function(a) {
            var c = b.getPointFromEvent(a);
            void 0 !== c && (b.isDirectTouch = !0, c.onMouseOver(a))
          };
        v(a.points, function(a) {
          a.graphic && (a.graphic.element.point = a);
          a.dataLabel &&
            (a.dataLabel.div ? a.dataLabel.div.point = a : a.dataLabel.element.point = a)
        });
        a._hasTracking || (v(a.trackerGroups, function(e) {
          if (a[e]) {
            a[e].addClass("highcharts-tracker").on("mouseover", c).on("mouseout", function(a) {
              b.onTrackerMouseOut(a)
            });
            if (y) a[e].on("touchstart", c);
            a.options.cursor && a[e].css(p).css({
              cursor: a.options.cursor
            })
          }
        }), a._hasTracking = !0);
        u(this, "afterDrawTracker")
      },
      drawTrackerGraph: function() {
        var a = this,
          b = a.options,
          c = b.trackByArea,
          e = [].concat(c ? a.areaPath : a.graphPath),
          f = e.length,
          h = a.chart,
          d =
          h.pointer,
          g = h.renderer,
          l = h.options.tooltip.snap,
          k = a.tracker,
          n, m = function() {
            if (h.hoverSeries !== a) a.onMouseOver()
          },
          t = "rgba(192,192,192," + (w ? .0001 : .002) + ")";
        if (f && !c)
          for (n = f + 1; n--;) "M" === e[n] && e.splice(n + 1, 0, e[n + 1] - l, e[n + 2], "L"), (n && "M" === e[n] || n === f) && e.splice(n, 0, "L", e[n - 2] + l, e[n - 1]);
        k ? k.attr({
          d: e
        }) : a.graph && (a.tracker = g.path(e).attr({
          "stroke-linejoin": "round",
          visibility: a.visible ? "visible" : "hidden",
          stroke: t,
          fill: c ? t : "none",
          "stroke-width": a.graph.strokeWidth() + (c ? 0 : 2 * l),
          zIndex: 2
        }).add(a.group), v([a.tracker,
          a.markerGroup
        ], function(a) {
          a.addClass("highcharts-tracker").on("mouseover", m).on("mouseout", function(a) {
            d.onTrackerMouseOut(a)
          });
          b.cursor && a.css({
            cursor: b.cursor
          });
          if (y) a.on("touchstart", m)
        }));
        u(this, "afterDrawTracker")
      }
    };
    h.column && (h.column.prototype.drawTracker = D.drawTrackerPoint);
    h.pie && (h.pie.prototype.drawTracker = D.drawTrackerPoint);
    h.scatter && (h.scatter.prototype.drawTracker = D.drawTrackerPoint);
    z(e.prototype, {
      setItemEvents: function(a, b, c) {
        var e = this,
          h = e.chart.renderer.boxWrapper,
          g = "highcharts-legend-" +
          (a instanceof f ? "point" : "series") + "-active";
        (c ? b : a.legendGroup).on("mouseover", function() {
          a.setState("hover");
          h.addClass(g);
          b.css(e.options.itemHoverStyle)
        }).on("mouseout", function() {
          b.css(t(a.visible ? e.itemStyle : e.itemHiddenStyle));
          h.removeClass(g);
          a.setState()
        }).on("click", function(b) {
          var d = function() {
            a.setVisible && a.setVisible()
          };
          h.removeClass(g);
          b = {
            browserEvent: b
          };
          a.firePointEvent ? a.firePointEvent("legendItemClick", b, d) : u(a, "legendItemClick", b, d)
        })
      },
      createCheckboxForItem: function(a) {
        a.checkbox =
          G("input", {
            type: "checkbox",
            checked: a.selected,
            defaultChecked: a.selected
          }, this.options.itemCheckboxStyle, this.chart.container);
        B(a.checkbox, "click", function(b) {
          u(a.series || a, "checkboxClick", {
            checked: b.target.checked,
            item: a
          }, function() {
            a.select()
          })
        })
      }
    });
    m.legend.itemStyle.cursor = "pointer";
    z(C.prototype, {
      showResetZoom: function() {
        function a() {
          b.zoomOut()
        }
        var b = this,
          c = m.lang,
          e = b.options.chart.resetZoomButton,
          f = e.theme,
          h = f.states,
          d = "chart" === e.relativeTo ? null : "plotBox";
        u(this, "beforeShowResetZoom", null,
          function() {
            b.resetZoomButton = b.renderer.button(c.resetZoom, null, null, a, f, h && h.hover).attr({
              align: e.position.align,
              title: c.resetZoomTitle
            }).addClass("highcharts-reset-zoom").add().align(e.position, !1, d)
          })
      },
      zoomOut: function() {
        u(this, "selection", {
          resetSelection: !0
        }, this.zoom)
      },
      zoom: function(a) {
        var c, e = this.pointer,
          f = !1,
          h;
        !a || a.resetSelection ? (v(this.axes, function(a) {
          c = a.zoom()
        }), e.initiated = !1) : v(a.xAxis.concat(a.yAxis), function(a) {
          var b = a.axis;
          e[b.isXAxis ? "zoomX" : "zoomY"] && (c = b.zoom(a.min, a.max), b.displayBtn &&
            (f = !0))
        });
        h = this.resetZoomButton;
        f && !h ? this.showResetZoom() : !f && b(h) && (this.resetZoomButton = h.destroy());
        c && this.redraw(n(this.options.chart.animation, a && a.animation, 100 > this.pointCount))
      },
      pan: function(a, b) {
        var c = this,
          e = c.hoverPoints,
          f;
        e && v(e, function(a) {
          a.setState()
        });
        v("xy" === b ? [1, 0] : [1], function(b) {
          b = c[b ? "xAxis" : "yAxis"][0];
          var d = b.horiz,
            e = a[d ? "chartX" : "chartY"],
            d = d ? "mouseDownX" : "mouseDownY",
            h = c[d],
            k = (b.pointRange || 0) / 2,
            g = b.reversed && !c.inverted || !b.reversed && c.inverted ? -1 : 1,
            l = b.getExtremes(),
            n = b.toValue(h - e, !0) + k * g,
            g = b.toValue(h + b.len - e, !0) - k * g,
            q = g < n,
            h = q ? g : n,
            n = q ? n : g,
            g = Math.min(l.dataMin, k ? l.min : b.toValue(b.toPixels(l.min) - b.minPixelPadding)),
            k = Math.max(l.dataMax, k ? l.max : b.toValue(b.toPixels(l.max) + b.minPixelPadding)),
            q = g - h;
          0 < q && (n += q, h = g);
          q = n - k;
          0 < q && (n = k, h -= q);
          b.series.length && h !== l.min && n !== l.max && (b.setExtremes(h, n, !1, !1, {
            trigger: "pan"
          }), f = !0);
          c[d] = e
        });
        f && c.redraw(!1);
        p(c.container, {
          cursor: "move"
        })
      }
    });
    z(f.prototype, {
      select: function(a, b) {
        var c = this,
          e = c.series,
          f = e.chart;
        a = n(a, !c.selected);
        c.firePointEvent(a ? "select" : "unselect", {
          accumulate: b
        }, function() {
          c.selected = c.options.selected = a;
          e.options.data[l(c, e.data)] = c.options;
          c.setState(a && "select");
          b || v(f.getSelectedPoints(), function(a) {
            a.selected && a !== c && (a.selected = a.options.selected = !1, e.options.data[l(a, e.data)] = a.options, a.setState(""), a.firePointEvent("unselect"))
          })
        })
      },
      onMouseOver: function(a) {
        var b = this.series.chart,
          c = b.pointer;
        a = a ? c.normalize(a) : c.getChartCoordinatesFromPoint(this, b.inverted);
        c.runPointActions(a, this)
      },
      onMouseOut: function() {
        var a =
          this.series.chart;
        this.firePointEvent("mouseOut");
        v(a.hoverPoints || [], function(a) {
          a.setState()
        });
        a.hoverPoints = a.hoverPoint = null
      },
      importEvents: function() {
        if (!this.hasImportedEvents) {
          var b = this,
            c = t(b.series.options.point, b.options).events;
          b.events = c;
          a.objectEach(c, function(a, c) {
            B(b, c, a)
          });
          this.hasImportedEvents = !0
        }
      },
      setState: function(a, b) {
        var c = Math.floor(this.plotX),
          e = this.plotY,
          f = this.series,
          h = f.options.states[a || "normal"] || {},
          d = g[f.type].marker && f.options.marker,
          l = d && !1 === d.enabled,
          r = d && d.states &&
          d.states[a || "normal"] || {},
          k = !1 === r.enabled,
          m = f.stateMarkerGraphic,
          t = this.marker || {},
          w = f.chart,
          p = f.halo,
          D, v = d && f.markerAttribs;
        a = a || "";
        if (!(a === this.state && !b || this.selected && "select" !== a || !1 === h.enabled || a && (k || l && !1 === r.enabled) || a && t.states && t.states[a] && !1 === t.states[a].enabled)) {
          v && (D = f.markerAttribs(this, a));
          if (this.graphic) this.state && this.graphic.removeClass("highcharts-point-" + this.state), a && this.graphic.addClass("highcharts-point-" + a), this.graphic.animate(f.pointAttribs(this, a), n(w.options.chart.animation,
            h.animation)), D && this.graphic.animate(D, n(w.options.chart.animation, r.animation, d.animation)), m && m.hide();
          else {
            if (a && r) {
              d = t.symbol || f.symbol;
              m && m.currentSymbol !== d && (m = m.destroy());
              if (m) m[b ? "animate" : "attr"]({
                x: D.x,
                y: D.y
              });
              else d && (f.stateMarkerGraphic = m = w.renderer.symbol(d, D.x, D.y, D.width, D.height).add(f.markerGroup), m.currentSymbol = d);
              m && m.attr(f.pointAttribs(this, a))
            }
            m && (m[a && w.isInsidePlot(c, e, w.inverted) ? "show" : "hide"](), m.element.point = this)
          }(c = h.halo) && c.size ? (p || (f.halo = p = w.renderer.path().add((this.graphic ||
            m).parentGroup)), p.show()[b ? "animate" : "attr"]({
            d: this.haloPath(c.size)
          }), p.attr({
            "class": "highcharts-halo highcharts-color-" + n(this.colorIndex, f.colorIndex) + (this.className ? " " + this.className : "")
          }), p.point = this, p.attr(z({
            fill: this.color || f.color,
            "fill-opacity": c.opacity,
            zIndex: -1
          }, c.attributes))) : p && p.point && p.point.haloPath && p.animate({
            d: p.point.haloPath(0)
          }, null, p.hide);
          this.state = a;
          u(this, "afterSetState")
        }
      },
      haloPath: function(a) {
        return this.series.chart.renderer.symbols.circle(Math.floor(this.plotX) -
          a, this.plotY - a, 2 * a, 2 * a)
      }
    });
    z(c.prototype, {
      onMouseOver: function() {
        var a = this.chart,
          b = a.hoverSeries;
        if (b && b !== this) b.onMouseOut();
        this.options.events.mouseOver && u(this, "mouseOver");
        this.setState("hover");
        a.hoverSeries = this
      },
      onMouseOut: function() {
        var a = this.options,
          b = this.chart,
          c = b.tooltip,
          e = b.hoverPoint;
        b.hoverSeries = null;
        if (e) e.onMouseOut();
        this && a.events.mouseOut && u(this, "mouseOut");
        !c || this.stickyTracking || c.shared && !this.noSharedTooltip || c.hide();
        this.setState()
      },
      setState: function(a) {
        var b = this,
          c = b.options,
          e = b.graph,
          f = c.states,
          h = c.lineWidth,
          c = 0;
        a = a || "";
        if (b.state !== a && (v([b.group, b.markerGroup, b.dataLabelsGroup], function(d) {
            d && (b.state && d.removeClass("highcharts-series-" + b.state), a && d.addClass("highcharts-series-" + a))
          }), b.state = a, !f[a] || !1 !== f[a].enabled) && (a && (h = f[a].lineWidth || h + (f[a].lineWidthPlus || 0)), e && !e.dashstyle))
          for (h = {
              "stroke-width": h
            }, e.animate(h, n(f[a || "normal"] && f[a || "normal"].animation, b.chart.options.chart.animation)); b["zone-graph-" + c];) b["zone-graph-" + c].attr(h), c += 1
      },
      setVisible: function(a, b) {
        var c = this,
          e = c.chart,
          f = c.legendItem,
          h, d = e.options.chart.ignoreHiddenSeries,
          g = c.visible;
        h = (c.visible = a = c.options.visible = c.userOptions.visible = void 0 === a ? !g : a) ? "show" : "hide";
        v(["group", "dataLabelsGroup", "markerGroup", "tracker", "tt"], function(a) {
          if (c[a]) c[a][h]()
        });
        if (e.hoverSeries === c || (e.hoverPoint && e.hoverPoint.series) === c) c.onMouseOut();
        f && e.legend.colorizeItem(c, a);
        c.isDirty = !0;
        c.options.stacking && v(e.series, function(a) {
          a.options.stacking && a.visible && (a.isDirty = !0)
        });
        v(c.linkedSeries,
          function(b) {
            b.setVisible(a, !1)
          });
        d && (e.isDirtyBox = !0);
        !1 !== b && e.redraw();
        u(c, h)
      },
      show: function() {
        this.setVisible(!0)
      },
      hide: function() {
        this.setVisible(!1)
      },
      select: function(a) {
        this.selected = a = void 0 === a ? !this.selected : a;
        this.checkbox && (this.checkbox.checked = a);
        u(this, a ? "select" : "unselect")
      },
      drawTracker: D.drawTrackerGraph
    })
  })(L);
  (function(a) {
    var B = a.Chart,
      C = a.each,
      G = a.inArray,
      p = a.isArray,
      m = a.isObject,
      g = a.pick,
      v = a.splat;
    B.prototype.setResponsive = function(g) {
      var m = this.options.responsive,
        p = [],
        l = this.currentResponsive;
      m && m.rules && C(m.rules, function(b) {
        void 0 === b._id && (b._id = a.uniqueKey());
        this.matchResponsiveRule(b, p, g)
      }, this);
      var b = a.merge.apply(0, a.map(p, function(b) {
          return a.find(m.rules, function(a) {
            return a._id === b
          }).chartOptions
        })),
        p = p.toString() || void 0;
      p !== (l && l.ruleIds) && (l && this.update(l.undoOptions, g), p ? (this.currentResponsive = {
        ruleIds: p,
        mergedOptions: b,
        undoOptions: this.currentOptions(b)
      }, this.update(b, g)) : this.currentResponsive = void 0)
    };
    B.prototype.matchResponsiveRule = function(a, m) {
      var p = a.condition;
      (p.callback || function() {
        return this.chartWidth <= g(p.maxWidth, Number.MAX_VALUE) && this.chartHeight <= g(p.maxHeight, Number.MAX_VALUE) && this.chartWidth >= g(p.minWidth, 0) && this.chartHeight >= g(p.minHeight, 0)
      }).call(this) && m.push(a._id)
    };
    B.prototype.currentOptions = function(g) {
      function u(g, b, e, t) {
        var l;
        a.objectEach(g, function(a, c) {
          if (!t && -1 < G(c, ["series", "xAxis", "yAxis"]))
            for (a = v(a), e[c] = [], l = 0; l < a.length; l++) b[c][l] && (e[c][l] = {}, u(a[l], b[c][l], e[c][l], t + 1));
          else m(a) ? (e[c] = p(a) ? [] : {}, u(a, b[c] || {}, e[c], t + 1)) :
            e[c] = b[c] || null
        })
      }
      var y = {};
      u(g, this.options, y, 0);
      return y
    }
  })(L);
  (function(a) {
    var B = a.addEvent,
      C = a.Axis,
      G = a.Chart,
      p = a.css,
      m = a.defined,
      g = a.each,
      v = a.extend,
      z = a.noop,
      u = a.pick,
      y = a.timeUnits,
      l = a.wrap;
    l(a.Series.prototype, "init", function(a) {
      var b;
      a.apply(this, Array.prototype.slice.call(arguments, 1));
      (b = this.xAxis) && b.options.ordinal && B(this, "updatedData", function() {
        delete b.ordinalIndex
      })
    });
    l(C.prototype, "getTimeTicks", function(a, e, g, l, f, c, h, w) {
      var b = 0,
        n, t, q = {},
        p, x, u, d = [],
        H = -Number.MAX_VALUE,
        E = this.options.tickPixelInterval,
        k = this.chart.time;
      if (!this.options.ordinal && !this.options.breaks || !c || 3 > c.length || void 0 === g) return a.call(this, e, g, l, f);
      x = c.length;
      for (n = 0; n < x; n++) {
        u = n && c[n - 1] > l;
        c[n] < g && (b = n);
        if (n === x - 1 || c[n + 1] - c[n] > 5 * h || u) {
          if (c[n] > H) {
            for (t = a.call(this, e, c[b], c[n], f); t.length && t[0] <= H;) t.shift();
            t.length && (H = t[t.length - 1]);
            d = d.concat(t)
          }
          b = n + 1
        }
        if (u) break
      }
      a = t.info;
      if (w && a.unitRange <= y.hour) {
        n = d.length - 1;
        for (b = 1; b < n; b++) k.dateFormat("%d", d[b]) !== k.dateFormat("%d", d[b - 1]) && (q[d[b]] = "day", p = !0);
        p && (q[d[0]] = "day");
        a.higherRanks =
          q
      }
      d.info = a;
      if (w && m(E)) {
        w = k = d.length;
        n = [];
        var A;
        for (p = []; w--;) b = this.translate(d[w]), A && (p[w] = A - b), n[w] = A = b;
        p.sort();
        p = p[Math.floor(p.length / 2)];
        p < .6 * E && (p = null);
        w = d[k - 1] > l ? k - 1 : k;
        for (A = void 0; w--;) b = n[w], l = Math.abs(A - b), A && l < .8 * E && (null === p || l < .8 * p) ? (q[d[w]] && !q[d[w + 1]] ? (l = w + 1, A = b) : l = w, d.splice(l, 1)) : A = b
      }
      return d
    });
    v(C.prototype, {
      beforeSetTickPositions: function() {
        var a, e = [],
          l = !1,
          n, f = this.getExtremes(),
          c = f.min,
          h = f.max,
          w, p = this.isXAxis && !!this.options.breaks,
          f = this.options.ordinal,
          r = Number.MAX_VALUE,
          v = this.chart.options.chart.ignoreHiddenSeries;
        n = "highcharts-navigator-xaxis" === this.options.className;
        !this.options.overscroll || this.max !== this.dataMax || this.chart.mouseIsDown && !n || this.eventArgs && (!this.eventArgs || "navigator" === this.eventArgs.trigger) || (this.max += this.options.overscroll, !n && m(this.userMin) && (this.min += this.options.overscroll));
        if (f || p) {
          g(this.series, function(b, c) {
            if (!(v && !1 === b.visible || !1 === b.takeOrdinalPosition && !p) && (e = e.concat(b.processedXData), a = e.length, e.sort(function(a, b) {
                return a -
                  b
              }), r = Math.min(r, u(b.closestPointRange, r)), a))
              for (c = a - 1; c--;) e[c] === e[c + 1] && e.splice(c, 1)
          });
          a = e.length;
          if (2 < a) {
            n = e[1] - e[0];
            for (w = a - 1; w-- && !l;) e[w + 1] - e[w] !== n && (l = !0);
            !this.options.keepOrdinalPadding && (e[0] - c > n || h - e[e.length - 1] > n) && (l = !0)
          } else this.options.overscroll && (2 === a ? r = e[1] - e[0] : 1 === a ? (r = this.options.overscroll, e = [e[0], e[0] + r]) : r = this.overscrollPointsRange);
          l ? (this.options.overscroll && (this.overscrollPointsRange = r, e = e.concat(this.getOverscrollPositions())), this.ordinalPositions = e, n = this.ordinal2lin(Math.max(c,
            e[0]), !0), w = Math.max(this.ordinal2lin(Math.min(h, e[e.length - 1]), !0), 1), this.ordinalSlope = h = (h - c) / (w - n), this.ordinalOffset = c - n * h) : (this.overscrollPointsRange = u(this.closestPointRange, this.overscrollPointsRange), this.ordinalPositions = this.ordinalSlope = this.ordinalOffset = void 0)
        }
        this.isOrdinal = f && l;
        this.groupIntervalFactor = null
      },
      val2lin: function(a, e) {
        var b = this.ordinalPositions;
        if (b) {
          var g = b.length,
            f, c;
          for (f = g; f--;)
            if (b[f] === a) {
              c = f;
              break
            }
          for (f = g - 1; f--;)
            if (a > b[f] || 0 === f) {
              a = (a - b[f]) / (b[f + 1] - b[f]);
              c = f +
                a;
              break
            }
          e = e ? c : this.ordinalSlope * (c || 0) + this.ordinalOffset
        } else e = a;
        return e
      },
      lin2val: function(a, e) {
        var b = this.ordinalPositions;
        if (b) {
          var g = this.ordinalSlope,
            f = this.ordinalOffset,
            c = b.length - 1,
            h;
          if (e) 0 > a ? a = b[0] : a > c ? a = b[c] : (c = Math.floor(a), h = a - c);
          else
            for (; c--;)
              if (e = g * c + f, a >= e) {
                g = g * (c + 1) + f;
                h = (a - e) / (g - e);
                break
              } return void 0 !== h && void 0 !== b[c] ? b[c] + (h ? h * (b[c + 1] - b[c]) : 0) : a
        }
        return a
      },
      getExtendedPositions: function() {
        var a = this,
          e = a.chart,
          l = a.series[0].currentDataGrouping,
          n = a.ordinalIndex,
          f = l ? l.count + l.unitName :
          "raw",
          c = a.options.overscroll,
          h = a.getExtremes(),
          m, p;
        n || (n = a.ordinalIndex = {});
        n[f] || (m = {
          series: [],
          chart: e,
          getExtremes: function() {
            return {
              min: h.dataMin,
              max: h.dataMax + c
            }
          },
          options: {
            ordinal: !0
          },
          val2lin: C.prototype.val2lin,
          ordinal2lin: C.prototype.ordinal2lin
        }, g(a.series, function(b) {
          p = {
            xAxis: m,
            xData: b.xData.slice(),
            chart: e,
            destroyGroupedData: z
          };
          p.xData = p.xData.concat(a.getOverscrollPositions());
          p.options = {
            dataGrouping: l ? {
              enabled: !0,
              forced: !0,
              approximation: "open",
              units: [
                [l.unitName, [l.count]]
              ]
            } : {
              enabled: !1
            }
          };
          b.processData.apply(p);
          m.series.push(p)
        }), a.beforeSetTickPositions.apply(m), n[f] = m.ordinalPositions);
        return n[f]
      },
      getOverscrollPositions: function() {
        var b = this.options.overscroll,
          e = this.overscrollPointsRange,
          g = [],
          l = this.dataMax;
        if (a.defined(e))
          for (g.push(l); l <= this.dataMax + b;) l += e, g.push(l);
        return g
      },
      getGroupIntervalFactor: function(a, e, g) {
        var b;
        g = g.processedXData;
        var f = g.length,
          c = [];
        b = this.groupIntervalFactor;
        if (!b) {
          for (b = 0; b < f - 1; b++) c[b] = g[b + 1] - g[b];
          c.sort(function(a, b) {
            return a - b
          });
          c = c[Math.floor(f /
            2)];
          a = Math.max(a, g[0]);
          e = Math.min(e, g[f - 1]);
          this.groupIntervalFactor = b = f * c / (e - a)
        }
        return b
      },
      postProcessTickInterval: function(a) {
        var b = this.ordinalSlope;
        return b ? this.options.breaks ? this.closestPointRange || a : a / (b / this.closestPointRange) : a
      }
    });
    C.prototype.ordinal2lin = C.prototype.val2lin;
    l(G.prototype, "pan", function(a, e) {
      var b = this.xAxis[0],
        l = b.options.overscroll,
        f = e.chartX,
        c = !1;
      if (b.options.ordinal && b.series.length) {
        var h = this.mouseDownX,
          m = b.getExtremes(),
          u = m.dataMax,
          r = m.min,
          v = m.max,
          q = this.hoverPoints,
          F = b.closestPointRange || b.overscrollPointsRange,
          h = (h - f) / (b.translationSlope * (b.ordinalSlope || F)),
          x = {
            ordinalPositions: b.getExtendedPositions()
          },
          F = b.lin2val,
          y = b.val2lin,
          d;
        x.ordinalPositions ? 1 < Math.abs(h) && (q && g(q, function(a) {
            a.setState()
          }), 0 > h ? (q = x, d = b.ordinalPositions ? b : x) : (q = b.ordinalPositions ? b : x, d = x), x = d.ordinalPositions, u > x[x.length - 1] && x.push(u), this.fixedRange = v - r, h = b.toFixedRange(null, null, F.apply(q, [y.apply(q, [r, !0]) + h, !0]), F.apply(d, [y.apply(d, [v, !0]) + h, !0])), h.min >= Math.min(m.dataMin, r) &&
          h.max <= Math.max(u, v) + l && b.setExtremes(h.min, h.max, !0, !1, {
            trigger: "pan"
          }), this.mouseDownX = f, p(this.container, {
            cursor: "move"
          })) : c = !0
      } else c = !0;
      c && (l && (b.max = b.dataMax + l), a.apply(this, Array.prototype.slice.call(arguments, 1)))
    })
  })(L);
  (function(a) {
    function B() {
      return Array.prototype.slice.call(arguments, 1)
    }

    function C(a) {
      a.apply(this);
      this.drawBreaks(this.xAxis, ["x"]);
      this.drawBreaks(this.yAxis, p(this.pointArrayMap, ["y"]))
    }
    var G = a.addEvent,
      p = a.pick,
      m = a.wrap,
      g = a.each,
      v = a.extend,
      z = a.isArray,
      u = a.fireEvent,
      y = a.Axis,
      l = a.Series;
    v(y.prototype, {
      isInBreak: function(a, e) {
        var b = a.repeat || Infinity,
          g = a.from,
          f = a.to - a.from;
        e = e >= g ? (e - g) % b : b - (g - e) % b;
        return a.inclusive ? e <= f : e < f && 0 !== e
      },
      isInAnyBreak: function(a, e) {
        var b = this.options.breaks,
          g = b && b.length,
          f, c, h;
        if (g) {
          for (; g--;) this.isInBreak(b[g], a) && (f = !0, c || (c = p(b[g].showPoints, this.isXAxis ? !1 : !0)));
          h = f && e ? f && !c : f
        }
        return h
      }
    });
    G(y, "afterSetTickPositions", function() {
      if (this.options.breaks) {
        var a = this.tickPositions,
          e = this.tickPositions.info,
          g = [],
          l;
        for (l = 0; l < a.length; l++) this.isInAnyBreak(a[l]) ||
          g.push(a[l]);
        this.tickPositions = g;
        this.tickPositions.info = e
      }
    });
    G(y, "afterSetOptions", function() {
      this.options.breaks && this.options.breaks.length && (this.options.ordinal = !1)
    });
    G(y, "afterInit", function() {
      var a = this,
        e;
      e = this.options.breaks;
      a.isBroken = z(e) && !!e.length;
      a.isBroken && (a.val2lin = function(b) {
        var e = b,
          f, c;
        for (c = 0; c < a.breakArray.length; c++)
          if (f = a.breakArray[c], f.to <= b) e -= f.len;
          else if (f.from >= b) break;
        else if (a.isInBreak(f, b)) {
          e -= b - f.from;
          break
        }
        return e
      }, a.lin2val = function(b) {
        var e, f;
        for (f = 0; f < a.breakArray.length &&
          !(e = a.breakArray[f], e.from >= b); f++) e.to < b ? b += e.len : a.isInBreak(e, b) && (b += e.len);
        return b
      }, a.setExtremes = function(a, b, e, c, h) {
        for (; this.isInAnyBreak(a);) a -= this.closestPointRange;
        for (; this.isInAnyBreak(b);) b -= this.closestPointRange;
        y.prototype.setExtremes.call(this, a, b, e, c, h)
      }, a.setAxisTranslation = function(b) {
        y.prototype.setAxisTranslation.call(this, b);
        b = a.options.breaks;
        var e = [],
          f = [],
          c = 0,
          h, l, m = a.userMin || a.min,
          r = a.userMax || a.max,
          t = p(a.pointRangePadding, 0),
          q, v;
        g(b, function(b) {
          l = b.repeat || Infinity;
          a.isInBreak(b,
            m) && (m += b.to % l - m % l);
          a.isInBreak(b, r) && (r -= r % l - b.from % l)
        });
        g(b, function(a) {
          q = a.from;
          for (l = a.repeat || Infinity; q - l > m;) q -= l;
          for (; q < m;) q += l;
          for (v = q; v < r; v += l) e.push({
            value: v,
            move: "in"
          }), e.push({
            value: v + (a.to - a.from),
            move: "out",
            size: a.breakSize
          })
        });
        e.sort(function(a, b) {
          return a.value === b.value ? ("in" === a.move ? 0 : 1) - ("in" === b.move ? 0 : 1) : a.value - b.value
        });
        h = 0;
        q = m;
        g(e, function(a) {
          h += "in" === a.move ? 1 : -1;
          1 === h && "in" === a.move && (q = a.value);
          0 === h && (f.push({
              from: q,
              to: a.value,
              len: a.value - q - (a.size || 0)
            }), c += a.value - q -
            (a.size || 0))
        });
        a.breakArray = f;
        a.unitLength = r - m - c + t;
        u(a, "afterBreaks");
        a.options.staticScale ? a.transA = a.options.staticScale : a.unitLength && (a.transA *= (r - a.min + t) / a.unitLength);
        t && (a.minPixelPadding = a.transA * a.minPointOffset);
        a.min = m;
        a.max = r
      })
    });
    m(l.prototype, "generatePoints", function(a) {
      a.apply(this, B(arguments));
      var b = this.xAxis,
        g = this.yAxis,
        l = this.points,
        f, c = l.length,
        h = this.options.connectNulls,
        m;
      if (b && g && (b.options.breaks || g.options.breaks))
        for (; c--;) f = l[c], m = null === f.y && !1 === h, m || !b.isInAnyBreak(f.x, !0) && !g.isInAnyBreak(f.y, !0) || (l.splice(c, 1), this.data[c] && this.data[c].destroyElements())
    });
    a.Series.prototype.drawBreaks = function(a, e) {
      var b = this,
        l = b.points,
        f, c, h, m;
      a && g(e, function(e) {
        f = a.breakArray || [];
        c = a.isXAxis ? a.min : p(b.options.threshold, a.min);
        g(l, function(b) {
          m = p(b["stack" + e.toUpperCase()], b[e]);
          g(f, function(e) {
            h = !1;
            if (c < e.from && m > e.to || c > e.from && m < e.from) h = "pointBreak";
            else if (c < e.from && m > e.from && m < e.to || c > e.from && m > e.to && m < e.from) h = "pointInBreak";
            h && u(a, h, {
              point: b,
              brk: e
            })
          })
        })
      })
    };
    a.Series.prototype.gappedPath =
      function() {
        var b = this.currentDataGrouping,
          e = b && b.totalRange,
          b = this.options.gapSize,
          g = this.points.slice(),
          l = g.length - 1,
          f = this.yAxis;
        if (b && 0 < l)
          for ("value" !== this.options.gapUnit && (b *= this.closestPointRange), e && e > b && (b = e); l--;) g[l + 1].x - g[l].x > b && (e = (g[l].x + g[l + 1].x) / 2, g.splice(l + 1, 0, {
            isNull: !0,
            x: e
          }), this.options.stacking && (e = f.stacks[this.stackKey][e] = new a.StackItem(f, f.options.stackLabels, !1, e, this.stack), e.total = 0));
        return this.getGraphPath(g)
      };
    m(a.seriesTypes.column.prototype, "drawPoints", C);
    m(a.Series.prototype,
      "drawPoints", C)
  })(L);
  (function(a) {
    var B = a.addEvent,
      C = a.arrayMax,
      G = a.arrayMin,
      p = a.Axis,
      m = a.defaultPlotOptions,
      g = a.defined,
      v = a.each,
      z = a.extend,
      u = a.format,
      y = a.isNumber,
      l = a.merge,
      b = a.pick,
      e = a.Point,
      t = a.Series,
      n = a.Tooltip,
      f = a.wrap,
      c = t.prototype,
      h = c.processData,
      w = c.generatePoints,
      D = {
        approximation: "average",
        groupPixelWidth: 2,
        dateTimeLabelFormats: {
          millisecond: ["%A, %b %e, %H:%M:%S.%L", "%A, %b %e, %H:%M:%S.%L", "-%H:%M:%S.%L"],
          second: ["%A, %b %e, %H:%M:%S", "%A, %b %e, %H:%M:%S", "-%H:%M:%S"],
          minute: ["%A, %b %e, %H:%M",
            "%A, %b %e, %H:%M", "-%H:%M"
          ],
          hour: ["%A, %b %e, %H:%M", "%A, %b %e, %H:%M", "-%H:%M"],
          day: ["%A, %b %e, %Y", "%A, %b %e", "-%A, %b %e, %Y"],
          // week: ["Week from %A, %b %e, %Y", "%A, %b %e", "-%A, %b %e, %Y"],
          week: ["Semana del %A, %b %e, %Y", "%A, %b %e", "-%A, %b %e, %Y"],
          month: ["%B %Y", "%B", "-%B %Y"],
          year: ["%Y", "%Y", "-%Y"]
        }
      },
      r = {
        line: {},
        spline: {},
        area: {},
        areaspline: {},
        column: {
          approximation: "sum",
          groupPixelWidth: 10
        },
        arearange: {
          approximation: "range"
        },
        areasplinerange: {
          approximation: "range"
        },
        columnrange: {
          approximation: "range",
          groupPixelWidth: 10
        },
        candlestick: {
          approximation: "ohlc",
          groupPixelWidth: 10
        },
        ohlc: {
          approximation: "ohlc",
          groupPixelWidth: 5
        }
      },
      J = a.defaultDataGroupingUnits = [
        ["millisecond", [1, 2, 5, 10, 20, 25, 50, 100, 200, 500]],
        ["second", [1, 2, 5, 10, 15, 30]],
        ["minute", [1, 2, 5, 10, 15, 30]],
        ["hour", [1, 2, 3, 4, 6, 8, 12]],
        ["day", [1]],
        ["week", [1]],
        ["month", [1, 3, 6]],
        ["year", null]
      ],
      q = a.approximations = {
        sum: function(a) {
          var b = a.length,
            c;
          if (!b && a.hasNulls) c = null;
          else if (b)
            for (c = 0; b--;) c += a[b];
          return c
        },
        average: function(a) {
          var b = a.length;
          a = q.sum(a);
          y(a) && b && (a /= b);
          return a
        },
        averages: function() {
          var a = [];
          v(arguments, function(b) {
            a.push(q.average(b))
          });
          return void 0 === a[0] ? void 0 : a
        },
        open: function(a) {
          return a.length ? a[0] : a.hasNulls ? null : void 0
        },
        high: function(a) {
          return a.length ? C(a) : a.hasNulls ? null : void 0
        },
        low: function(a) {
          return a.length ? G(a) : a.hasNulls ? null : void 0
        },
        close: function(a) {
          return a.length ? a[a.length - 1] : a.hasNulls ? null : void 0
        },
        ohlc: function(a, b, c, d) {
          a = q.open(a);
          b = q.high(b);
          c = q.low(c);
          d = q.close(d);
          if (y(a) || y(b) || y(c) || y(d)) return [a, b, c, d]
        },
        range: function(a, b) {
          a = q.low(a);
          b = q.high(b);
          if (y(a) ||
            y(b)) return [a, b];
          if (null === a && null === b) return null
        }
      };
    c.groupData = function(a, b, c, d) {
      var e = this.data,
        f = this.options.data,
        k = [],
        h = [],
        g = [],
        l = a.length,
        m, n, p = !!b,
        w = [];
      d = "function" === typeof d ? d : q[d] || r[this.type] && q[r[this.type].approximation] || q[D.approximation];
      var x = this.pointArrayMap,
        t = x && x.length,
        u = 0;
      n = 0;
      var F, z;
      t ? v(x, function() {
        w.push([])
      }) : w.push([]);
      F = t || 1;
      for (z = 0; z <= l && !(a[z] >= c[0]); z++);
      for (z; z <= l; z++) {
        for (; void 0 !== c[u + 1] && a[z] >= c[u + 1] || z === l;) {
          m = c[u];
          this.dataGroupInfo = {
            start: n,
            length: w[0].length
          };
          n = d.apply(this, w);
          void 0 !== n && (k.push(m), h.push(n), g.push(this.dataGroupInfo));
          n = z;
          for (m = 0; m < F; m++) w[m].length = 0, w[m].hasNulls = !1;
          u += 1;
          if (z === l) break
        }
        if (z === l) break;
        if (x) {
          m = this.cropStart + z;
          var J = e && e[m] || this.pointClass.prototype.applyOptions.apply({
              series: this
            }, [f[m]]),
            B;
          for (m = 0; m < t; m++) B = J[x[m]], y(B) ? w[m].push(B) : null === B && (w[m].hasNulls = !0)
        } else m = p ? b[z] : null, y(m) ? w[0].push(m) : null === m && (w[0].hasNulls = !0)
      }
      return [k, h, g]
    };
    c.processData = function() {
      var a = this.chart,
        e = this.options.dataGrouping,
        f = !1 !==
        this.allowDG && e && b(e.enabled, a.options.isStock),
        d = this.visible || !a.options.chart.ignoreHiddenSeries,
        l, m = this.currentDataGrouping,
        k;
      this.forceCrop = f;
      this.groupPixelWidth = null;
      this.hasProcessed = !0;
      if (!1 !== h.apply(this, arguments) && f) {
        this.destroyGroupedData();
        var n, q = e.groupAll ? this.xData : this.processedXData,
          r = e.groupAll ? this.yData : this.processedYData,
          p = a.plotSizeX,
          a = this.xAxis,
          w = a.options.ordinal,
          t = this.groupPixelWidth = a.getGroupPixelWidth && a.getGroupPixelWidth();
        if (t) {
          this.isDirty = l = !0;
          this.points =
            null;
          f = a.getExtremes();
          k = f.min;
          f = f.max;
          w = w && a.getGroupIntervalFactor(k, f, this) || 1;
          t = t * (f - k) / p * w;
          p = a.getTimeTicks(a.normalizeTimeTickInterval(t, e.units || J), Math.min(k, q[0]), Math.max(f, q[q.length - 1]), a.options.startOfWeek, q, this.closestPointRange);
          r = c.groupData.apply(this, [q, r, p, e.approximation]);
          q = r[0];
          w = r[1];
          if (e.smoothed && q.length) {
            n = q.length - 1;
            for (q[n] = Math.min(q[n], f); n-- && 0 < n;) q[n] += t / 2;
            q[0] = Math.max(q[0], k)
          }
          k = p.info;
          this.closestPointRange = p.info.totalRange;
          this.groupMap = r[2];
          g(q[0]) && q[0] < a.dataMin &&
            d && (a.min <= a.dataMin && (a.min = q[0]), a.dataMin = q[0]);
          e.groupAll && (e = this.cropData(q, w, a.min, a.max, 1), q = e.xData, w = e.yData);
          this.processedXData = q;
          this.processedYData = w
        } else this.groupMap = null;
        this.hasGroupedData = l;
        this.currentDataGrouping = k;
        this.preventGraphAnimation = (m && m.totalRange) !== (k && k.totalRange)
      }
    };
    c.destroyGroupedData = function() {
      var a = this.groupedData;
      v(a || [], function(b, c) {
        b && (a[c] = b.destroy ? b.destroy() : null)
      });
      this.groupedData = null
    };
    c.generatePoints = function() {
      w.apply(this);
      this.destroyGroupedData();
      this.groupedData = this.hasGroupedData ? this.points : null
    };
    B(e, "update", function() {
      if (this.dataGroup) return a.error(24), !1
    });
    f(n.prototype, "tooltipFooterHeaderFormatter", function(a, b, c) {
      var d = this.chart.time,
        e = b.series,
        f = e.tooltipOptions,
        k = e.options.dataGrouping,
        h = f.xDateFormat,
        g, l = e.xAxis;
      return l && "datetime" === l.options.type && k && y(b.key) ? (a = e.currentDataGrouping, k = k.dateTimeLabelFormats, a ? (l = k[a.unitName], 1 === a.count ? h = l[0] : (h = l[1], g = l[2])) : !h && k && (h = this.getXDateFormat(b, f, l)), h = d.dateFormat(h, b.key),
        g && (h += d.dateFormat(g, b.key + a.totalRange - 1)), u(f[(c ? "footer" : "header") + "Format"], {
          point: z(b.point, {
            key: h
          }),
          series: e
        }, d)) : a.call(this, b, c)
    });
    B(t, "destroy", c.destroyGroupedData);
    B(t, "afterSetOptions", function(a) {
      a = a.options;
      var b = this.type,
        c = this.chart.options.plotOptions,
        d = m[b].dataGrouping,
        e = this.useCommonDataGrouping && D;
      if (r[b] || e) d || (d = l(D, r[b])), a.dataGrouping = l(e, d, c.series && c.series.dataGrouping, c[b].dataGrouping, this.userOptions.dataGrouping);
      this.chart.options.isStock && (this.requireSorting = !0)
    });
    B(p, "afterSetScale", function() {
      v(this.series, function(a) {
        a.hasProcessed = !1
      })
    });
    p.prototype.getGroupPixelWidth = function() {
      var a = this.series,
        b = a.length,
        c, d = 0,
        e = !1,
        f;
      for (c = b; c--;)(f = a[c].options.dataGrouping) && (d = Math.max(d, f.groupPixelWidth));
      for (c = b; c--;)(f = a[c].options.dataGrouping) && a[c].hasProcessed && (b = (a[c].processedXData || a[c].data).length, a[c].groupPixelWidth || b > this.chart.plotSizeX / d || b && f.forced) && (e = !0);
      return e ? d : 0
    };
    p.prototype.setDataGrouping = function(a, c) {
      var e;
      c = b(c, !0);
      a || (a = {
        forced: !1,
        units: null
      });
      if (this instanceof p)
        for (e = this.series.length; e--;) this.series[e].update({
          dataGrouping: a
        }, !1);
      else v(this.chart.options.series, function(b) {
        b.dataGrouping = a
      }, !1);
      this.ordinalSlope = null;
      c && this.chart.redraw()
    }
  })(L);
  (function(a) {
    var B = a.each,
      C = a.Point,
      G = a.seriesType,
      p = a.seriesTypes;
    G("ohlc", "column", {
      lineWidth: 1,
      tooltip: {
        pointFormat: '\x3cspan style\x3d"color:{point.color}"\x3e\u25cf\x3c/span\x3e \x3cb\x3e {series.name}\x3c/b\x3e\x3cbr/\x3eOpen: {point.open}\x3cbr/\x3eHigh: {point.high}\x3cbr/\x3eLow: {point.low}\x3cbr/\x3eClose: {point.close}\x3cbr/\x3e'
      },
      threshold: null,
      states: {
        hover: {
          lineWidth: 3
        }
      },
      stickyTracking: !0
    }, {
      directTouch: !1,
      pointArrayMap: ["open", "high", "low", "close"],
      toYData: function(a) {
        return [a.open, a.high, a.low, a.close]
      },
      pointValKey: "close",
      pointAttrToOptions: {
        stroke: "color",
        "stroke-width": "lineWidth"
      },
      pointAttribs: function(a, g) {
        g = p.column.prototype.pointAttribs.call(this, a, g);
        var m = this.options;
        delete g.fill;
        !a.options.color && m.upColor && a.open < a.close && (g.stroke = m.upColor);
        return g
      },
      translate: function() {
        var a = this,
          g = a.yAxis,
          v = !!a.modifyValue,
          z = ["plotOpen", "plotHigh", "plotLow", "plotClose", "yBottom"];
        p.column.prototype.translate.apply(a);
        B(a.points, function(m) {
          B([m.open, m.high, m.low, m.close, m.low], function(p, l) {
            null !== p && (v && (p = a.modifyValue(p)), m[z[l]] = g.toPixels(p, !0))
          });
          m.tooltipPos[1] = m.plotHigh + g.pos - a.chart.plotTop
        })
      },
      drawPoints: function() {
        var a = this,
          g = a.chart;
        B(a.points, function(m) {
          var p, u, v, l, b = m.graphic,
            e, t = !b;
          void 0 !== m.plotY && (b || (m.graphic = b = g.renderer.path().add(a.group)), b.attr(a.pointAttribs(m, m.selected && "select")), u = b.strokeWidth() %
            2 / 2, e = Math.round(m.plotX) - u, v = Math.round(m.shapeArgs.width / 2), l = ["M", e, Math.round(m.yBottom), "L", e, Math.round(m.plotHigh)], null !== m.open && (p = Math.round(m.plotOpen) + u, l.push("M", e, p, "L", e - v, p)), null !== m.close && (p = Math.round(m.plotClose) + u, l.push("M", e, p, "L", e + v, p)), b[t ? "attr" : "animate"]({
              d: l
            }).addClass(m.getClassName(), !0))
        })
      },
      animate: null
    }, {
      getClassName: function() {
        return C.prototype.getClassName.call(this) + (this.open < this.close ? " highcharts-point-up" : " highcharts-point-down")
      }
    })
  })(L);
  (function(a) {
    var B =
      a.defaultPlotOptions,
      C = a.each,
      G = a.merge,
      p = a.seriesType,
      m = a.seriesTypes;
    p("candlestick", "ohlc", G(B.column, {
      states: {
        hover: {
          lineWidth: 2
        }
      },
      tooltip: B.ohlc.tooltip,
      threshold: null,
      lineColor: "#000000",
      lineWidth: 1,
      upColor: "#ffffff",
      stickyTracking: !0
    }), {
      pointAttribs: function(a, p) {
        var g = m.column.prototype.pointAttribs.call(this, a, p),
          u = this.options,
          v = a.open < a.close,
          l = u.lineColor || this.color;
        g["stroke-width"] = u.lineWidth;
        g.fill = a.options.color || (v ? u.upColor || this.color : this.color);
        g.stroke = a.lineColor || (v ? u.upLineColor ||
          l : l);
        p && (a = u.states[p], g.fill = a.color || g.fill, g.stroke = a.lineColor || g.stroke, g["stroke-width"] = a.lineWidth || g["stroke-width"]);
        return g
      },
      drawPoints: function() {
        var a = this,
          m = a.chart;
        C(a.points, function(g) {
          var p = g.graphic,
            v, l, b, e, t, n, f, c = !p;
          void 0 !== g.plotY && (p || (g.graphic = p = m.renderer.path().add(a.group)), p.attr(a.pointAttribs(g, g.selected && "select")).shadow(a.options.shadow), t = p.strokeWidth() % 2 / 2, n = Math.round(g.plotX) - t, v = g.plotOpen, l = g.plotClose, b = Math.min(v, l), v = Math.max(v, l), f = Math.round(g.shapeArgs.width /
            2), l = Math.round(b) !== Math.round(g.plotHigh), e = v !== g.yBottom, b = Math.round(b) + t, v = Math.round(v) + t, t = [], t.push("M", n - f, v, "L", n - f, b, "L", n + f, b, "L", n + f, v, "Z", "M", n, b, "L", n, l ? Math.round(g.plotHigh) : b, "M", n, v, "L", n, e ? Math.round(g.yBottom) : v), p[c ? "attr" : "animate"]({
            d: t
          }).addClass(g.getClassName(), !0))
        })
      }
    })
  })(L);
  da = function(a) {
    var B = a.each,
      C = a.defined,
      G = a.seriesTypes,
      p = a.stableSort;
    return {
      getPlotBox: function() {
        return a.Series.prototype.getPlotBox.call(this.options.onSeries && this.chart.get(this.options.onSeries) ||
          this)
      },
      translate: function() {
        G.column.prototype.translate.apply(this);
        var a = this.options,
          g = this.chart,
          v = this.points,
          z = v.length - 1,
          u, y, l = a.onSeries,
          l = l && g.get(l),
          a = a.onKey || "y",
          b = l && l.options.step,
          e = l && l.points,
          t = e && e.length,
          n = g.inverted,
          f = this.xAxis,
          c = this.yAxis,
          h = 0,
          w, D, r, J;
        if (l && l.visible && t)
          for (h = (l.pointXOffset || 0) + (l.barW || 0) / 2, u = l.currentDataGrouping, D = e[t - 1].x + (u ? u.totalRange : 0), p(v, function(a, b) {
              return a.x - b.x
            }), a = "plot" + a[0].toUpperCase() + a.substr(1); t-- && v[z] && !(w = e[t], u = v[z], u.y = w.y, w.x <=
              u.x && void 0 !== w[a] && (u.x <= D && (u.plotY = w[a], w.x < u.x && !b && (r = e[t + 1]) && void 0 !== r[a] && (J = (u.x - w.x) / (r.x - w.x), u.plotY += J * (r[a] - w[a]), u.y += J * (r.y - w.y))), z--, t++, 0 > z)););
        B(v, function(a, b) {
          var e;
          a.plotX += h;
          if (void 0 === a.plotY || n) 0 <= a.plotX && a.plotX <= f.len ? n ? (a.plotY = f.translate(a.x, 0, 1, 0, 1), a.plotX = C(a.y) ? c.translate(a.y, 0, 0, 0, 1) : 0) : a.plotY = g.chartHeight - f.bottom - (f.opposite ? f.height : 0) + f.offset - c.top : a.shapeArgs = {};
          (y = v[b - 1]) && y.plotX === a.plotX && (void 0 === y.stackIndex && (y.stackIndex = 0), e = y.stackIndex + 1);
          a.stackIndex = e
        });
        this.onSeries = l
      }
    }
  }(L);
  (function(a, B) {
    function C(a) {
      l[a + "pin"] = function(b, g, m, f, c) {
        var e = c && c.anchorX;
        c = c && c.anchorY;
        "circle" === a && f > m && (b -= Math.round((f - m) / 2), m = f);
        b = l[a](b, g, m, f);
        e && c && (b.push("M", "circle" === a ? b[1] - b[4] : b[1] + b[4] / 2, g > c ? g : g + f, "L", e, c), b = b.concat(l.circle(e - 1, c - 1, 2, 2)));
        return b
      }
    }
    var G = a.addEvent,
      p = a.each,
      m = a.merge,
      g = a.noop,
      v = a.Renderer,
      z = a.seriesType,
      u = a.TrackerMixin,
      y = a.VMLRenderer,
      l = a.SVGRenderer.prototype.symbols;
    z("flags", "column", {
      pointRange: 0,
      allowOverlapX: !1,
      shape: "flag",
      stackDistance: 12,
      textAlign: "center",
      tooltip: {
        pointFormat: "{point.text}\x3cbr/\x3e"
      },
      threshold: null,
      y: -30,
      fillColor: "#ffffff",
      lineWidth: 1,
      states: {
        hover: {
          lineColor: "#000000",
          fillColor: "#ccd6eb"
        }
      },
      style: {
        fontSize: "11px",
        fontWeight: "bold"
      }
    }, {
      sorted: !1,
      noSharedTooltip: !0,
      allowDG: !1,
      takeOrdinalPosition: !1,
      trackerGroups: ["markerGroup"],
      forceCrop: !0,
      init: a.Series.prototype.init,
      pointAttribs: function(a, e) {
        var b = this.options,
          g = a && a.color || this.color,
          f = b.lineColor,
          c = a && a.lineWidth;
        a = a && a.fillColor ||
          b.fillColor;
        e && (a = b.states[e].fillColor, f = b.states[e].lineColor, c = b.states[e].lineWidth);
        return {
          fill: a || g,
          stroke: f || g,
          "stroke-width": c || b.lineWidth || 0
        }
      },
      translate: B.translate,
      getPlotBox: B.getPlotBox,
      drawPoints: function() {
        var b = this.points,
          e = this.chart,
          g = e.renderer,
          l, f, c = e.inverted,
          h = this.options,
          w = h.y,
          u, r, v, q, y, x, z = this.yAxis,
          d = {},
          H = [];
        for (r = b.length; r--;) v = b[r], x = (c ? v.plotY : v.plotX) > this.xAxis.len, l = v.plotX, q = v.stackIndex, u = v.options.shape || h.shape, f = v.plotY, void 0 !== f && (f = v.plotY + w - (void 0 !== q &&
          q * h.stackDistance)), v.anchorX = q ? void 0 : v.plotX, y = q ? void 0 : v.plotY, q = v.graphic, void 0 !== f && 0 <= l && !x ? (q || (q = v.graphic = g.label("", null, null, u, null, null, h.useHTML).attr(this.pointAttribs(v)).css(m(h.style, v.style)).attr({
          align: "flag" === u ? "left" : "center",
          width: h.width,
          height: h.height,
          "text-align": h.textAlign
        }).addClass("highcharts-point").add(this.markerGroup), v.graphic.div && (v.graphic.div.point = v), q.shadow(h.shadow), q.isNew = !0), 0 < l && (l -= q.strokeWidth() % 2), u = {
          y: f,
          anchorY: y
        }, h.allowOverlapX && (u.x = l, u.anchorX =
          v.anchorX), q.attr({
          text: v.options.title || h.title || "A"
        })[q.isNew ? "attr" : "animate"](u), h.allowOverlapX || (d[v.plotX] ? d[v.plotX].size = Math.max(d[v.plotX].size, q.width) : d[v.plotX] = {
          align: 0,
          size: q.width,
          target: l,
          anchorX: l
        }), v.tooltipPos = [l, f + z.pos - e.plotTop]) : q && (v.graphic = q.destroy());
        h.allowOverlapX || (a.objectEach(d, function(a) {
          a.plotX = a.anchorX;
          H.push(a)
        }), a.distribute(H, c ? z.len : this.xAxis.len, 100), p(b, function(a) {
          var b = a.graphic && d[a.plotX];
          b && (a.graphic[a.graphic.isNew ? "attr" : "animate"]({
              x: b.pos,
              anchorX: a.anchorX
            }),
            a.graphic.isNew = !1)
        }));
        h.useHTML && a.wrap(this.markerGroup, "on", function(b) {
          return a.SVGElement.prototype.on.apply(b.apply(this, [].slice.call(arguments, 1)), [].slice.call(arguments, 1))
        })
      },
      drawTracker: function() {
        var a = this.points;
        u.drawTrackerPoint.apply(this);
        p(a, function(b) {
          var e = b.graphic;
          e && G(e.element, "mouseover", function() {
            0 < b.stackIndex && !b.raised && (b._y = e.y, e.attr({
              y: b._y - 8
            }), b.raised = !0);
            p(a, function(a) {
              a !== b && a.raised && a.graphic && (a.graphic.attr({
                y: a._y
              }), a.raised = !1)
            })
          })
        })
      },
      animate: g,
      buildKDTree: g,
      setClip: g,
      invertGroups: g
    });
    l.flag = function(a, e, g, m, f) {
      var b = f && f.anchorX || a;
      f = f && f.anchorY || e;
      return l.circle(b - 1, f - 1, 2, 2).concat(["M", b, f, "L", a, e + m, a, e, a + g, e, a + g, e + m, a, e + m, "Z"])
    };
    C("circle");
    C("square");
    v === y && p(["flag", "circlepin", "squarepin"], function(a) {
      y.prototype.symbols[a] = l[a]
    })
  })(L, da);
  (function(a) {
    function B(a, b, c) {
      this.init(a, b, c)
    }
    var C = a.addEvent,
      G = a.Axis,
      p = a.correctFloat,
      m = a.defaultOptions,
      g = a.defined,
      v = a.destroyObjectProperties,
      z = a.each,
      u = a.fireEvent,
      y = a.hasTouch,
      l = a.isTouchDevice,
      b =
      a.merge,
      e = a.pick,
      t = a.removeEvent,
      n = a.wrap,
      f, c = {
        height: l ? 20 : 14,
        barBorderRadius: 0,
        buttonBorderRadius: 0,
        liveRedraw: a.svg && !l,
        margin: 10,
        minWidth: 6,
        step: .2,
        zIndex: 3,
        barBackgroundColor: "#cccccc",
        barBorderWidth: 1,
        barBorderColor: "#cccccc",
        buttonArrowColor: "#333333",
        buttonBackgroundColor: "#e6e6e6",
        buttonBorderColor: "#cccccc",
        buttonBorderWidth: 1,
        rifleColor: "#333333",
        trackBackgroundColor: "#f2f2f2",
        trackBorderColor: "#f2f2f2",
        trackBorderWidth: 1
      };
    m.scrollbar = b(!0, c, m.scrollbar);
    a.swapXY = f = function(a, b) {
      var c = a.length,
        e;
      if (b)
        for (b = 0; b < c; b += 3) e = a[b + 1], a[b + 1] = a[b + 2], a[b + 2] = e;
      return a
    };
    B.prototype = {
      init: function(a, f, g) {
        this.scrollbarButtons = [];
        this.renderer = a;
        this.userOptions = f;
        this.options = b(c, f);
        this.chart = g;
        this.size = e(this.options.size, this.options.height);
        f.enabled && (this.render(), this.initEvents(), this.addEvents())
      },
      render: function() {
        var a = this.renderer,
          b = this.options,
          c = this.size,
          e;
        this.group = e = a.g("scrollbar").attr({
          zIndex: b.zIndex,
          translateY: -99999
        }).add();
        this.track = a.rect().addClass("highcharts-scrollbar-track").attr({
          x: 0,
          r: b.trackBorderRadius || 0,
          height: c,
          width: c
        }).add(e);
        this.track.attr({
          fill: b.trackBackgroundColor,
          stroke: b.trackBorderColor,
          "stroke-width": b.trackBorderWidth
        });
        this.trackBorderWidth = this.track.strokeWidth();
        this.track.attr({
          y: -this.trackBorderWidth % 2 / 2
        });
        this.scrollbarGroup = a.g().add(e);
        this.scrollbar = a.rect().addClass("highcharts-scrollbar-thumb").attr({
          height: c,
          width: c,
          r: b.barBorderRadius || 0
        }).add(this.scrollbarGroup);
        this.scrollbarRifles = a.path(f(["M", -3, c / 4, "L", -3, 2 * c / 3, "M", 0, c / 4, "L", 0, 2 * c / 3, "M",
          3, c / 4, "L", 3, 2 * c / 3
        ], b.vertical)).addClass("highcharts-scrollbar-rifles").add(this.scrollbarGroup);
        this.scrollbar.attr({
          fill: b.barBackgroundColor,
          stroke: b.barBorderColor,
          "stroke-width": b.barBorderWidth
        });
        this.scrollbarRifles.attr({
          stroke: b.rifleColor,
          "stroke-width": 1
        });
        this.scrollbarStrokeWidth = this.scrollbar.strokeWidth();
        this.scrollbarGroup.translate(-this.scrollbarStrokeWidth % 2 / 2, -this.scrollbarStrokeWidth % 2 / 2);
        this.drawScrollbarButton(0);
        this.drawScrollbarButton(1)
      },
      position: function(a, b, c, e) {
        var f =
          this.options.vertical,
          h = 0,
          g = this.rendered ? "animate" : "attr";
        this.x = a;
        this.y = b + this.trackBorderWidth;
        this.width = c;
        this.xOffset = this.height = e;
        this.yOffset = h;
        f ? (this.width = this.yOffset = c = h = this.size, this.xOffset = b = 0, this.barWidth = e - 2 * c, this.x = a += this.options.margin) : (this.height = this.xOffset = e = b = this.size, this.barWidth = c - 2 * e, this.y += this.options.margin);
        this.group[g]({
          translateX: a,
          translateY: this.y
        });
        this.track[g]({
          width: c,
          height: e
        });
        this.scrollbarButtons[1][g]({
          translateX: f ? 0 : c - b,
          translateY: f ? e - h : 0
        })
      },
      drawScrollbarButton: function(a) {
        var b = this.renderer,
          c = this.scrollbarButtons,
          e = this.options,
          h = this.size,
          g;
        g = b.g().add(this.group);
        c.push(g);
        g = b.rect().addClass("highcharts-scrollbar-button").add(g);
        g.attr({
          stroke: e.buttonBorderColor,
          "stroke-width": e.buttonBorderWidth,
          fill: e.buttonBackgroundColor
        });
        g.attr(g.crisp({
          x: -.5,
          y: -.5,
          width: h + 1,
          height: h + 1,
          r: e.buttonBorderRadius
        }, g.strokeWidth()));
        g = b.path(f(["M", h / 2 + (a ? -1 : 1), h / 2 - 3, "L", h / 2 + (a ? -1 : 1), h / 2 + 3, "L", h / 2 + (a ? 2 : -2), h / 2], e.vertical)).addClass("highcharts-scrollbar-arrow").add(c[a]);
        g.attr({
          fill: e.buttonArrowColor
        })
      },
      setRange: function(a, b) {
        var c = this.options,
          e = c.vertical,
          f = c.minWidth,
          h = this.barWidth,
          l, m, n = this.rendered && !this.hasDragged ? "animate" : "attr";
        g(h) && (a = Math.max(a, 0), l = Math.ceil(h * a), this.calculatedWidth = m = p(h * Math.min(b, 1) - l), m < f && (l = (h - f + m) * a, m = f), f = Math.floor(l + this.xOffset + this.yOffset), h = m / 2 - .5, this.from = a, this.to = b, e ? (this.scrollbarGroup[n]({
            translateY: f
          }), this.scrollbar[n]({
            height: m
          }), this.scrollbarRifles[n]({
            translateY: h
          }), this.scrollbarTop = f, this.scrollbarLeft =
          0) : (this.scrollbarGroup[n]({
          translateX: f
        }), this.scrollbar[n]({
          width: m
        }), this.scrollbarRifles[n]({
          translateX: h
        }), this.scrollbarLeft = f, this.scrollbarTop = 0), 12 >= m ? this.scrollbarRifles.hide() : this.scrollbarRifles.show(!0), !1 === c.showFull && (0 >= a && 1 <= b ? this.group.hide() : this.group.show()), this.rendered = !0)
      },
      initEvents: function() {
        var a = this;
        a.mouseMoveHandler = function(b) {
          var c = a.chart.pointer.normalize(b),
            e = a.options.vertical ? "chartY" : "chartX",
            f = a.initPositions;
          !a.grabbedCenter || b.touches && 0 === b.touches[0][e] ||
            (c = a.cursorToScrollbarPosition(c)[e], e = a[e], e = c - e, a.hasDragged = !0, a.updatePosition(f[0] + e, f[1] + e), a.hasDragged && u(a, "changed", {
              from: a.from,
              to: a.to,
              trigger: "scrollbar",
              DOMType: b.type,
              DOMEvent: b
            }))
        };
        a.mouseUpHandler = function(b) {
          a.hasDragged && u(a, "changed", {
            from: a.from,
            to: a.to,
            trigger: "scrollbar",
            DOMType: b.type,
            DOMEvent: b
          });
          a.grabbedCenter = a.hasDragged = a.chartX = a.chartY = null
        };
        a.mouseDownHandler = function(b) {
          b = a.chart.pointer.normalize(b);
          b = a.cursorToScrollbarPosition(b);
          a.chartX = b.chartX;
          a.chartY = b.chartY;
          a.initPositions = [a.from, a.to];
          a.grabbedCenter = !0
        };
        a.buttonToMinClick = function(b) {
          var c = p(a.to - a.from) * a.options.step;
          a.updatePosition(p(a.from - c), p(a.to - c));
          u(a, "changed", {
            from: a.from,
            to: a.to,
            trigger: "scrollbar",
            DOMEvent: b
          })
        };
        a.buttonToMaxClick = function(b) {
          var c = (a.to - a.from) * a.options.step;
          a.updatePosition(a.from + c, a.to + c);
          u(a, "changed", {
            from: a.from,
            to: a.to,
            trigger: "scrollbar",
            DOMEvent: b
          })
        };
        a.trackClick = function(b) {
          var c = a.chart.pointer.normalize(b),
            e = a.to - a.from,
            f = a.y + a.scrollbarTop,
            g = a.x + a.scrollbarLeft;
          a.options.vertical && c.chartY > f || !a.options.vertical && c.chartX > g ? a.updatePosition(a.from + e, a.to + e) : a.updatePosition(a.from - e, a.to - e);
          u(a, "changed", {
            from: a.from,
            to: a.to,
            trigger: "scrollbar",
            DOMEvent: b
          })
        }
      },
      cursorToScrollbarPosition: function(a) {
        var b = this.options,
          b = b.minWidth > this.calculatedWidth ? b.minWidth : 0;
        return {
          chartX: (a.chartX - this.x - this.xOffset) / (this.barWidth - b),
          chartY: (a.chartY - this.y - this.yOffset) / (this.barWidth - b)
        }
      },
      updatePosition: function(a, b) {
        1 < b && (a = p(1 - p(b - a)), b = 1);
        0 > a && (b = p(b - a), a = 0);
        this.from = a;
        this.to = b
      },
      update: function(a) {
        this.destroy();
        this.init(this.chart.renderer, b(!0, this.options, a), this.chart)
      },
      addEvents: function() {
        var a = this.options.inverted ? [1, 0] : [0, 1],
          b = this.scrollbarButtons,
          c = this.scrollbarGroup.element,
          e = this.mouseDownHandler,
          f = this.mouseMoveHandler,
          g = this.mouseUpHandler,
          a = [
            [b[a[0]].element, "click", this.buttonToMinClick],
            [b[a[1]].element, "click", this.buttonToMaxClick],
            [this.track.element, "click", this.trackClick],
            [c, "mousedown", e],
            [c.ownerDocument, "mousemove", f],
            [c.ownerDocument,
              "mouseup", g
            ]
          ];
        y && a.push([c, "touchstart", e], [c.ownerDocument, "touchmove", f], [c.ownerDocument, "touchend", g]);
        z(a, function(a) {
          C.apply(null, a)
        });
        this._events = a
      },
      removeEvents: function() {
        z(this._events, function(a) {
          t.apply(null, a)
        });
        this._events.length = 0
      },
      destroy: function() {
        var a = this.chart.scroller;
        this.removeEvents();
        z(["track", "scrollbarRifles", "scrollbar", "scrollbarGroup", "group"], function(a) {
          this[a] && this[a].destroy && (this[a] = this[a].destroy())
        }, this);
        a && this === a.scrollbar && (a.scrollbar = null, v(a.scrollbarButtons))
      }
    };
    n(G.prototype, "init", function(a) {
      var b = this;
      a.apply(b, Array.prototype.slice.call(arguments, 1));
      b.options.scrollbar && b.options.scrollbar.enabled && (b.options.scrollbar.vertical = !b.horiz, b.options.startOnTick = b.options.endOnTick = !1, b.scrollbar = new B(b.chart.renderer, b.options.scrollbar, b.chart), C(b.scrollbar, "changed", function(a) {
        var c = Math.min(e(b.options.min, b.min), b.min, b.dataMin),
          f = Math.max(e(b.options.max, b.max), b.max, b.dataMax) - c,
          g;
        b.horiz && !b.reversed || !b.horiz && b.reversed ? (g = c + f * this.to, c += f *
          this.from) : (g = c + f * (1 - this.from), c += f * (1 - this.to));
        b.setExtremes(c, g, !0, !1, a)
      }))
    });
    n(G.prototype, "render", function(a) {
      var b = Math.min(e(this.options.min, this.min), this.min, e(this.dataMin, this.min)),
        c = Math.max(e(this.options.max, this.max), this.max, e(this.dataMax, this.max)),
        f = this.scrollbar,
        h = this.titleOffset || 0;
      a.apply(this, Array.prototype.slice.call(arguments, 1));
      if (f) {
        this.horiz ? (f.position(this.left, this.top + this.height + 2 + this.chart.scrollbarsOffsets[1] + (this.opposite ? 0 : h + this.axisTitleMargin + this.offset),
          this.width, this.height), h = 1) : (f.position(this.left + this.width + 2 + this.chart.scrollbarsOffsets[0] + (this.opposite ? h + this.axisTitleMargin + this.offset : 0), this.top, this.width, this.height), h = 0);
        if (!this.opposite && !this.horiz || this.opposite && this.horiz) this.chart.scrollbarsOffsets[h] += this.scrollbar.size + this.scrollbar.options.margin;
        isNaN(b) || isNaN(c) || !g(this.min) || !g(this.max) ? f.setRange(0, 0) : (h = (this.min - b) / (c - b), b = (this.max - b) / (c - b), this.horiz && !this.reversed || !this.horiz && this.reversed ? f.setRange(h,
          b) : f.setRange(1 - b, 1 - h))
      }
    });
    n(G.prototype, "getOffset", function(a) {
      var b = this.horiz ? 2 : 1,
        c = this.scrollbar;
      a.apply(this, Array.prototype.slice.call(arguments, 1));
      c && (this.chart.scrollbarsOffsets = [0, 0], this.chart.axisOffset[b] += c.size + c.options.margin)
    });
    n(G.prototype, "destroy", function(a) {
      this.scrollbar && (this.scrollbar = this.scrollbar.destroy());
      a.apply(this, Array.prototype.slice.call(arguments, 1))
    });
    a.Scrollbar = B
  })(L);
  (function(a) {
    function B(a) {
      this.init(a)
    }
    var C = a.addEvent,
      G = a.Axis,
      p = a.Chart,
      m = a.color,
      g = a.defaultOptions,
      v = a.defined,
      z = a.destroyObjectProperties,
      u = a.each,
      y = a.erase,
      l = a.error,
      b = a.extend,
      e = a.grep,
      t = a.hasTouch,
      n = a.isArray,
      f = a.isNumber,
      c = a.isObject,
      h = a.merge,
      w = a.pick,
      D = a.removeEvent,
      r = a.Scrollbar,
      J = a.Series,
      q = a.seriesTypes,
      F = a.wrap,
      x = [].concat(a.defaultDataGroupingUnits),
      K = function(a) {
        var b = e(arguments, f);
        if (b.length) return Math[a].apply(0, b)
      };
    x[4] = ["day", [1, 2, 3, 4]];
    x[5] = ["week", [1, 2, 3]];
    q = void 0 === q.areaspline ? "line" : "areaspline";
    b(g, {
      navigator: {
        height: 40,
        margin: 25,
        maskInside: !0,
        handles: {
          width: 7,
          height: 15,
          symbols: ["navigator-handle", "navigator-handle"],
          enabled: !0,
          lineWidth: 1,
          backgroundColor: "#f2f2f2",
          borderColor: "#999999"
        },
        maskFill: m("#6685c2").setOpacity(.3).get(),
        outlineColor: "#cccccc",
        outlineWidth: 1,
        series: {
          type: q,
          fillOpacity: .05,
          lineWidth: 1,
          compare: null,
          dataGrouping: {
            approximation: "average",
            enabled: !0,
            groupPixelWidth: 2,
            smoothed: !0,
            units: x
          },
          dataLabels: {
            enabled: !1,
            zIndex: 2
          },
          id: "highcharts-navigator-series",
          className: "highcharts-navigator-series",
          lineColor: null,
          marker: {
            enabled: !1
          },
          pointRange: 0,
          threshold: null
        },
        xAxis: {
          overscroll: 0,
          className: "highcharts-navigator-xaxis",
          tickLength: 0,
          lineWidth: 0,
          gridLineColor: "#e6e6e6",
          gridLineWidth: 1,
          tickPixelInterval: 200,
          labels: {
            align: "left",
            style: {
              color: "#999999"
            },
            x: 3,
            y: -4
          },
          crosshair: !1
        },
        yAxis: {
          className: "highcharts-navigator-yaxis",
          gridLineWidth: 0,
          startOnTick: !1,
          endOnTick: !1,
          minPadding: .1,
          maxPadding: .1,
          labels: {
            enabled: !1
          },
          crosshair: !1,
          title: {
            text: null
          },
          tickLength: 0,
          tickWidth: 0
        }
      }
    });
    a.Renderer.prototype.symbols["navigator-handle"] = function(a, b, c, e, f) {
      a = f.width /
        2;
      b = Math.round(a / 3) + .5;
      f = f.height;
      return ["M", -a - 1, .5, "L", a, .5, "L", a, f + .5, "L", -a - 1, f + .5, "L", -a - 1, .5, "M", -b, 4, "L", -b, f - 3, "M", b - 1, 4, "L", b - 1, f - 3]
    };
    B.prototype = {
      drawHandle: function(a, b, c, e) {
        var d = this.navigatorOptions.handles.height;
        this.handles[b][e](c ? {
          translateX: Math.round(this.left + this.height / 2),
          translateY: Math.round(this.top + parseInt(a, 10) + .5 - d)
        } : {
          translateX: Math.round(this.left + parseInt(a, 10)),
          translateY: Math.round(this.top + this.height / 2 - d / 2 - 1)
        })
      },
      drawOutline: function(a, b, c, e) {
        var d = this.navigatorOptions.maskInside,
          f = this.outline.strokeWidth(),
          k = f / 2,
          f = f % 2 / 2,
          g = this.outlineHeight,
          h = this.scrollbarHeight,
          l = this.size,
          m = this.left - h,
          n = this.top;
        c ? (m -= k, c = n + b + f, b = n + a + f, a = ["M", m + g, n - h - f, "L", m + g, c, "L", m, c, "L", m, b, "L", m + g, b, "L", m + g, n + l + h].concat(d ? ["M", m + g, c - k, "L", m + g, b + k] : [])) : (a += m + h - f, b += m + h - f, n += k, a = ["M", m, n, "L", a, n, "L", a, n + g, "L", b, n + g, "L", b, n, "L", m + l + 2 * h, n].concat(d ? ["M", a - k, n, "L", b + k, n] : []));
        this.outline[e]({
          d: a
        })
      },
      drawMasks: function(a, b, c, e) {
        var d = this.left,
          f = this.top,
          k = this.height,
          g, h, l, m;
        c ? (l = [d, d, d], m = [f, f + a,
          f + b
        ], h = [k, k, k], g = [a, b - a, this.size - b]) : (l = [d, d + a, d + b], m = [f, f, f], h = [a, b - a, this.size - b], g = [k, k, k]);
        u(this.shades, function(a, b) {
          a[e]({
            x: l[b],
            y: m[b],
            width: h[b],
            height: g[b]
          })
        })
      },
      renderElements: function() {
        var a = this,
          b = a.navigatorOptions,
          c = b.maskInside,
          e = a.chart,
          f = e.inverted,
          g = e.renderer,
          h;
        a.navigatorGroup = h = g.g("navigator").attr({
          zIndex: 8,
          visibility: "hidden"
        }).add();
        var l = {
          cursor: f ? "ns-resize" : "ew-resize"
        };
        u([!c, c, !c], function(d, c) {
          a.shades[c] = g.rect().addClass("highcharts-navigator-mask" + (1 === c ? "-inside" :
            "-outside")).attr({
            fill: d ? b.maskFill : "rgba(0,0,0,0)"
          }).css(1 === c && l).add(h)
        });
        a.outline = g.path().addClass("highcharts-navigator-outline").attr({
          "stroke-width": b.outlineWidth,
          stroke: b.outlineColor
        }).add(h);
        b.handles.enabled && u([0, 1], function(d) {
          b.handles.inverted = e.inverted;
          a.handles[d] = g.symbol(b.handles.symbols[d], -b.handles.width / 2 - 1, 0, b.handles.width, b.handles.height, b.handles);
          a.handles[d].attr({
            zIndex: 7 - d
          }).addClass("highcharts-navigator-handle highcharts-navigator-handle-" + ["left", "right"][d]).add(h);
          var c = b.handles;
          a.handles[d].attr({
            fill: c.backgroundColor,
            stroke: c.borderColor,
            "stroke-width": c.lineWidth
          }).css(l)
        })
      },
      update: function(a) {
        u(this.series || [], function(a) {
          a.baseSeries && delete a.baseSeries.navigatorSeries
        });
        this.destroy();
        h(!0, this.chart.options.navigator, this.options, a);
        this.init(this.chart)
      },
      render: function(b, c, e, k) {
        var d = this.chart,
          g, h, l = this.scrollbarHeight,
          m, n = this.xAxis;
        g = n.fake ? d.xAxis[0] : n;
        var q = this.navigatorEnabled,
          p, r = this.rendered;
        h = d.inverted;
        var t, x = d.xAxis[0].minRange,
          u =
          d.xAxis[0].options.maxRange;
        if (!this.hasDragged || v(e)) {
          if (!f(b) || !f(c))
            if (r) e = 0, k = w(n.width, g.width);
            else return;
          this.left = w(n.left, d.plotLeft + l + (h ? d.plotWidth : 0));
          this.size = p = m = w(n.len, (h ? d.plotHeight : d.plotWidth) - 2 * l);
          d = h ? l : m + 2 * l;
          e = w(e, n.toPixels(b, !0));
          k = w(k, n.toPixels(c, !0));
          f(e) && Infinity !== Math.abs(e) || (e = 0, k = d);
          b = n.toValue(e, !0);
          c = n.toValue(k, !0);
          t = Math.abs(a.correctFloat(c - b));
          t < x ? this.grabbedLeft ? e = n.toPixels(c - x, !0) : this.grabbedRight && (k = n.toPixels(b + x, !0)) : v(u) && t > u && (this.grabbedLeft ?
            e = n.toPixels(c - u, !0) : this.grabbedRight && (k = n.toPixels(b + u, !0)));
          this.zoomedMax = Math.min(Math.max(e, k, 0), p);
          this.zoomedMin = Math.min(Math.max(this.fixedWidth ? this.zoomedMax - this.fixedWidth : Math.min(e, k), 0), p);
          this.range = this.zoomedMax - this.zoomedMin;
          p = Math.round(this.zoomedMax);
          e = Math.round(this.zoomedMin);
          q && (this.navigatorGroup.attr({
            visibility: "visible"
          }), r = r && !this.hasDragged ? "animate" : "attr", this.drawMasks(e, p, h, r), this.drawOutline(e, p, h, r), this.navigatorOptions.handles.enabled && (this.drawHandle(e,
            0, h, r), this.drawHandle(p, 1, h, r)));
          this.scrollbar && (h ? (h = this.top - l, g = this.left - l + (q || !g.opposite ? 0 : (g.titleOffset || 0) + g.axisTitleMargin), l = m + 2 * l) : (h = this.top + (q ? this.height : -l), g = this.left - l), this.scrollbar.position(g, h, d, l), this.scrollbar.setRange(this.zoomedMin / m, this.zoomedMax / m));
          this.rendered = !0
        }
      },
      addMouseEvents: function() {
        var a = this,
          b = a.chart,
          c = b.container,
          e = [],
          f, g;
        a.mouseMoveHandler = f = function(b) {
          a.onMouseMove(b)
        };
        a.mouseUpHandler = g = function(b) {
          a.onMouseUp(b)
        };
        e = a.getPartsEvents("mousedown");
        e.push(C(c, "mousemove", f), C(c.ownerDocument, "mouseup", g));
        t && (e.push(C(c, "touchmove", f), C(c.ownerDocument, "touchend", g)), e.concat(a.getPartsEvents("touchstart")));
        a.eventsToUnbind = e;
        a.series && a.series[0] && e.push(C(a.series[0].xAxis, "foundExtremes", function() {
          b.navigator.modifyNavigatorAxisExtremes()
        }))
      },
      getPartsEvents: function(a) {
        var b = this,
          d = [];
        u(["shades", "handles"], function(c) {
          u(b[c], function(e, f) {
            d.push(C(e.element, a, function(a) {
              b[c + "Mousedown"](a, f)
            }))
          })
        });
        return d
      },
      shadesMousedown: function(a,
        b) {
        a = this.chart.pointer.normalize(a);
        var d = this.chart,
          c = this.xAxis,
          e = this.zoomedMin,
          f = this.left,
          g = this.size,
          h = this.range,
          l = a.chartX,
          m, n;
        d.inverted && (l = a.chartY, f = this.top);
        1 === b ? (this.grabbedCenter = l, this.fixedWidth = h, this.dragOffset = l - e) : (a = l - f - h / 2, 0 === b ? a = Math.max(0, a) : 2 === b && a + h >= g && (a = g - h, c.reversed ? (a -= h, n = this.getUnionExtremes().dataMin) : m = this.getUnionExtremes().dataMax), a !== e && (this.fixedWidth = h, b = c.toFixedRange(a, a + h, n, m), v(b.min) && d.xAxis[0].setExtremes(Math.min(b.min, b.max), Math.max(b.min,
          b.max), !0, null, {
          trigger: "navigator"
        })))
      },
      handlesMousedown: function(a, b) {
        this.chart.pointer.normalize(a);
        a = this.chart;
        var d = a.xAxis[0],
          c = a.inverted && !d.reversed || !a.inverted && d.reversed;
        0 === b ? (this.grabbedLeft = !0, this.otherHandlePos = this.zoomedMax, this.fixedExtreme = c ? d.min : d.max) : (this.grabbedRight = !0, this.otherHandlePos = this.zoomedMin, this.fixedExtreme = c ? d.max : d.min);
        a.fixedRange = null
      },
      onMouseMove: function(a) {
        var b = this,
          d = b.chart,
          c = b.left,
          e = b.navigatorSize,
          f = b.range,
          g = b.dragOffset,
          h = d.inverted;
        a.touches &&
          0 === a.touches[0].pageX || (a = d.pointer.normalize(a), d = a.chartX, h && (c = b.top, d = a.chartY), b.grabbedLeft ? (b.hasDragged = !0, b.render(0, 0, d - c, b.otherHandlePos)) : b.grabbedRight ? (b.hasDragged = !0, b.render(0, 0, b.otherHandlePos, d - c)) : b.grabbedCenter && (b.hasDragged = !0, d < g ? d = g : d > e + g - f && (d = e + g - f), b.render(0, 0, d - g, d - g + f)), b.hasDragged && b.scrollbar && b.scrollbar.options.liveRedraw && (a.DOMType = a.type, setTimeout(function() {
            b.onMouseUp(a)
          }, 0)))
      },
      onMouseUp: function(a) {
        var b = this.chart,
          d = this.xAxis,
          c = d && d.reversed,
          e = this.scrollbar,
          f, g, h = a.DOMEvent || a;
        (!this.hasDragged || e && e.hasDragged) && "scrollbar" !== a.trigger || (e = this.getUnionExtremes(), this.zoomedMin === this.otherHandlePos ? f = this.fixedExtreme : this.zoomedMax === this.otherHandlePos && (g = this.fixedExtreme), this.zoomedMax === this.size && (g = c ? e.dataMin : e.dataMax), 0 === this.zoomedMin && (f = c ? e.dataMax : e.dataMin), d = d.toFixedRange(this.zoomedMin, this.zoomedMax, f, g), v(d.min) && b.xAxis[0].setExtremes(Math.min(d.min, d.max), Math.max(d.min, d.max), !0, this.hasDragged ? !1 : null, {
          trigger: "navigator",
          triggerOp: "navigator-drag",
          DOMEvent: h
        }));
        "mousemove" !== a.DOMType && (this.grabbedLeft = this.grabbedRight = this.grabbedCenter = this.fixedWidth = this.fixedExtreme = this.otherHandlePos = this.hasDragged = this.dragOffset = null)
      },
      removeEvents: function() {
        this.eventsToUnbind && (u(this.eventsToUnbind, function(a) {
          a()
        }), this.eventsToUnbind = void 0);
        this.removeBaseSeriesEvents()
      },
      removeBaseSeriesEvents: function() {
        var a = this.baseSeries || [];
        this.navigatorEnabled && a[0] && (!1 !== this.navigatorOptions.adaptToUpdatedData && u(a, function(a) {
          D(a,
            "updatedData", this.updatedDataHandler)
        }, this), a[0].xAxis && D(a[0].xAxis, "foundExtremes", this.modifyBaseAxisExtremes))
      },
      init: function(a) {
        var b = a.options,
          d = b.navigator,
          c = d.enabled,
          e = b.scrollbar,
          f = e.enabled,
          b = c ? d.height : 0,
          g = f ? e.height : 0;
        this.handles = [];
        this.shades = [];
        this.chart = a;
        this.setBaseSeries();
        this.height = b;
        this.scrollbarHeight = g;
        this.scrollbarEnabled = f;
        this.navigatorEnabled = c;
        this.navigatorOptions = d;
        this.scrollbarOptions = e;
        this.outlineHeight = b + g;
        this.opposite = w(d.opposite, !c && a.inverted);
        var l =
          this,
          e = l.baseSeries,
          f = a.xAxis.length,
          m = a.yAxis.length,
          n = e && e[0] && e[0].xAxis || a.xAxis[0] || {
            options: {}
          };
        a.extraMargin = {
          type: l.opposite ? "plotTop" : "marginBottom",
          value: (c || !a.inverted ? l.outlineHeight : 0) + d.margin
        };
        a.inverted && (a.extraMargin.type = l.opposite ? "marginRight" : "plotLeft");
        a.isDirtyBox = !0;
        l.navigatorEnabled ? (l.xAxis = new G(a, h({
          breaks: n.options.breaks,
          ordinal: n.options.ordinal
        }, d.xAxis, {
          id: "navigator-x-axis",
          yAxis: "navigator-y-axis",
          isX: !0,
          type: "datetime",
          index: f,
          offset: 0,
          keepOrdinalPadding: !0,
          startOnTick: !1,
          endOnTick: !1,
          minPadding: 0,
          maxPadding: 0,
          zoomEnabled: !1
        }, a.inverted ? {
          offsets: [g, 0, -g, 0],
          width: b
        } : {
          offsets: [0, -g, 0, g],
          height: b
        })), l.yAxis = new G(a, h(d.yAxis, {
          id: "navigator-y-axis",
          alignTicks: !1,
          offset: 0,
          index: m,
          zoomEnabled: !1
        }, a.inverted ? {
          width: b
        } : {
          height: b
        })), e || d.series.data ? l.updateNavigatorSeries(!1) : 0 === a.series.length && (l.unbindRedraw = C(a, "beforeRedraw", function() {
          0 < a.series.length && !l.series && (l.setBaseSeries(), l.unbindRedraw())
        })), l.renderElements(), l.addMouseEvents()) : l.xAxis = {
          translate: function(b, d) {
            var c = a.xAxis[0],
              e = c.getExtremes(),
              f = c.len - 2 * g,
              k = K("min", c.options.min, e.dataMin),
              c = K("max", c.options.max, e.dataMax) - k;
            return d ? b * c / f + k : f * (b - k) / c
          },
          toPixels: function(a) {
            return this.translate(a)
          },
          toValue: function(a) {
            return this.translate(a, !0)
          },
          toFixedRange: G.prototype.toFixedRange,
          fake: !0
        };
        a.options.scrollbar.enabled && (a.scrollbar = l.scrollbar = new r(a.renderer, h(a.options.scrollbar, {
          margin: l.navigatorEnabled ? 0 : 10,
          vertical: a.inverted
        }), a), C(l.scrollbar, "changed", function(b) {
          var d =
            l.size,
            c = d * this.to,
            d = d * this.from;
          l.hasDragged = l.scrollbar.hasDragged;
          l.render(0, 0, d, c);
          (a.options.scrollbar.liveRedraw || "mousemove" !== b.DOMType && "touchmove" !== b.DOMType) && setTimeout(function() {
            l.onMouseUp(b)
          })
        }));
        l.addBaseSeriesEvents();
        l.addChartEvents()
      },
      getUnionExtremes: function(a) {
        var b = this.chart.xAxis[0],
          d = this.xAxis,
          c = d.options,
          e = b.options,
          f;
        a && null === b.dataMin || (f = {
          dataMin: w(c && c.min, K("min", e.min, b.dataMin, d.dataMin, d.min)),
          dataMax: w(c && c.max, K("max", e.max, b.dataMax, d.dataMax, d.max))
        });
        return f
      },
      setBaseSeries: function(a, b) {
        var d = this.chart,
          c = this.baseSeries = [];
        a = a || d.options && d.options.navigator.baseSeries || 0;
        u(d.series || [], function(b, d) {
          b.options.isInternal || !b.options.showInNavigator && (d !== a && b.options.id !== a || !1 === b.options.showInNavigator) || c.push(b)
        });
        this.xAxis && !this.xAxis.fake && this.updateNavigatorSeries(!0, b)
      },
      updateNavigatorSeries: function(d, c) {
        var e = this,
          f = e.chart,
          l = e.baseSeries,
          m, q, p = e.navigatorOptions.series,
          r, t = {
            enableMouseTracking: !1,
            index: null,
            linkedTo: null,
            group: "nav",
            padXAxis: !1,
            xAxis: "navigator-x-axis",
            yAxis: "navigator-y-axis",
            showInLegend: !1,
            stacking: !1,
            isInternal: !0,
            visible: !0
          },
          x = e.series = a.grep(e.series || [], function(b) {
            var d = b.baseSeries;
            return 0 > a.inArray(d, l) ? (d && (D(d, "updatedData", e.updatedDataHandler), delete d.navigatorSeries), b.destroy(), !1) : !0
          });
        l && l.length && u(l, function(a) {
          var d = a.navigatorSeries,
            k = b({
              color: a.color
            }, n(p) ? g.navigator.series : p);
          d && !1 === e.navigatorOptions.adaptToUpdatedData || (t.name = "Navigator " + l.length, m = a.options || {}, r = m.navigatorOptions || {}, q =
            h(m, t, k, r), k = r.data || k.data, e.hasNavigatorData = e.hasNavigatorData || !!k, q.data = k || m.data && m.data.slice(0), d && d.options ? d.update(q, c) : (a.navigatorSeries = f.initSeries(q), a.navigatorSeries.baseSeries = a, x.push(a.navigatorSeries)))
        });
        if (p.data && (!l || !l.length) || n(p)) e.hasNavigatorData = !1, p = a.splat(p), u(p, function(a, b) {
          t.name = "Navigator " + (x.length + 1);
          q = h(g.navigator.series, {
            color: f.series[b] && !f.series[b].options.isInternal && f.series[b].color || f.options.colors[b] || f.options.colors[0]
          }, t, a);
          q.data = a.data;
          q.data && (e.hasNavigatorData = !0, x.push(f.initSeries(q)))
        });
        d && this.addBaseSeriesEvents()
      },
      addBaseSeriesEvents: function() {
        var a = this,
          b = a.baseSeries || [];
        b[0] && b[0].xAxis && C(b[0].xAxis, "foundExtremes", this.modifyBaseAxisExtremes);
        u(b, function(b) {
          C(b, "show", function() {
            this.navigatorSeries && this.navigatorSeries.setVisible(!0, !1)
          });
          C(b, "hide", function() {
            this.navigatorSeries && this.navigatorSeries.setVisible(!1, !1)
          });
          !1 !== this.navigatorOptions.adaptToUpdatedData && b.xAxis && C(b, "updatedData", this.updatedDataHandler);
          C(b, "remove", function() {
            this.navigatorSeries && (y(a.series, this.navigatorSeries), v(this.navigatorSeries.options) && this.navigatorSeries.remove(!1), delete this.navigatorSeries)
          })
        }, this)
      },
      modifyNavigatorAxisExtremes: function() {
        var a = this.xAxis,
          b;
        a.getExtremes && (!(b = this.getUnionExtremes(!0)) || b.dataMin === a.min && b.dataMax === a.max || (a.min = b.dataMin, a.max = b.dataMax))
      },
      modifyBaseAxisExtremes: function() {
        var a = this.chart.navigator,
          b = this.getExtremes(),
          c = b.dataMin,
          e = b.dataMax,
          b = b.max - b.min,
          g = a.stickToMin,
          h =
          a.stickToMax,
          l = w(this.options.overscroll, 0),
          m, n, q = a.series && a.series[0],
          p = !!this.setExtremes;
        this.eventArgs && "rangeSelectorButton" === this.eventArgs.trigger || (g && (n = c, m = n + b), h && (m = e + l, g || (n = Math.max(m - b, q && q.xData ? q.xData[0] : -Number.MAX_VALUE))), p && (g || h) && f(n) && (this.min = this.userMin = n, this.max = this.userMax = m));
        a.stickToMin = a.stickToMax = null
      },
      updatedDataHandler: function() {
        var a = this.chart.navigator,
          b = this.navigatorSeries;
        a.stickToMax = a.xAxis.reversed ? 0 === Math.round(a.zoomedMin) : Math.round(a.zoomedMax) >=
          Math.round(a.size);
        a.stickToMin = f(this.xAxis.min) && this.xAxis.min <= this.xData[0] && (!this.chart.fixedRange || !a.stickToMax);
        b && !a.hasNavigatorData && (b.options.pointStart = this.xData[0], b.setData(this.options.data, !1, null, !1))
      },
      addChartEvents: function() {
        C(this.chart, "redraw", function() {
          var a = this.navigator,
            b = a && (a.baseSeries && a.baseSeries[0] && a.baseSeries[0].xAxis || a.scrollbar && this.xAxis[0]);
          b && a.render(b.min, b.max)
        })
      },
      destroy: function() {
        this.removeEvents();
        this.xAxis && (y(this.chart.xAxis, this.xAxis),
          y(this.chart.axes, this.xAxis));
        this.yAxis && (y(this.chart.yAxis, this.yAxis), y(this.chart.axes, this.yAxis));
        u(this.series || [], function(a) {
          a.destroy && a.destroy()
        });
        u("series xAxis yAxis shades outline scrollbarTrack scrollbarRifles scrollbarGroup scrollbar navigatorGroup rendered".split(" "), function(a) {
          this[a] && this[a].destroy && this[a].destroy();
          this[a] = null
        }, this);
        u([this.handles], function(a) {
          z(a)
        }, this)
      }
    };
    a.Navigator = B;
    F(G.prototype, "zoom", function(a, b, c) {
      var d = this.chart,
        e = d.options,
        f = e.chart.zoomType,
        g = e.chart.pinchType,
        h = e.navigator,
        e = e.rangeSelector,
        l;
      this.isXAxis && (h && h.enabled || e && e.enabled) && ("x" === f || "x" === g ? d.resetZoomButton = "blocked" : "y" === f ? l = !1 : "xy" !== f && "xy" !== g || !this.options.range || (d = this.previousZoom, v(b) ? this.previousZoom = [this.min, this.max] : d && (b = d[0], c = d[1], delete this.previousZoom)));
      return void 0 !== l ? l : a.call(this, b, c)
    });
    C(p, "beforeRender", function() {
      var a = this.options;
      if (a.navigator.enabled || a.scrollbar.enabled) this.scroller = this.navigator = new B(this)
    });
    C(p, "afterSetChartSize",
      function() {
        var a = this.legend,
          b = this.navigator,
          c, e, f, g;
        b && (e = a && a.options, f = b.xAxis, g = b.yAxis, c = b.scrollbarHeight, this.inverted ? (b.left = b.opposite ? this.chartWidth - c - b.height : this.spacing[3] + c, b.top = this.plotTop + c) : (b.left = this.plotLeft + c, b.top = b.navigatorOptions.top || this.chartHeight - b.height - c - this.spacing[2] - (this.rangeSelector && this.extraBottomMargin ? this.rangeSelector.getHeight() : 0) - (e && "bottom" === e.verticalAlign && e.enabled && !e.floating ? a.legendHeight + w(e.margin, 10) : 0)), f && g && (this.inverted ? f.options.left =
          g.options.left = b.left : f.options.top = g.options.top = b.top, f.setAxisSize(), g.setAxisSize()))
      });
    F(J.prototype, "addPoint", function(a, b, e, f, g) {
      var d = this.options.turboThreshold;
      d && this.xData.length > d && c(b, !0) && this.chart.navigator && l(20, !0);
      a.call(this, b, e, f, g)
    });
    C(p, "afterAddSeries", function() {
      this.navigator && this.navigator.setBaseSeries(null, !1)
    });
    C(J, "afterUpdate", function() {
      this.chart.navigator && !this.options.isInternal && this.chart.navigator.setBaseSeries(null, !1)
    });
    p.prototype.callbacks.push(function(a) {
      var b =
        a.navigator;
      b && a.xAxis[0] && (a = a.xAxis[0].getExtremes(), b.render(a.min, a.max))
    })
  })(L);
  (function(a) {
    function B(a) {
      this.init(a)
    }
    var C = a.addEvent,
      G = a.Axis,
      p = a.Chart,
      m = a.css,
      g = a.createElement,
      v = a.defaultOptions,
      z = a.defined,
      u = a.destroyObjectProperties,
      y = a.discardElement,
      l = a.each,
      b = a.extend,
      e = a.fireEvent,
      t = a.isNumber,
      n = a.merge,
      f = a.pick,
      c = a.pInt,
      h = a.splat,
      w = a.wrap;
    b(v, {
      rangeSelector: {
        verticalAlign: "top",
        buttonTheme: {
          "stroke-width": 0,
          width: 28,
          height: 18,
          padding: 2,
          zIndex: 7
        },
        floating: !1,
        x: 0,
        y: 0,
        height: void 0,
        inputPosition: {
          align: "right",
          x: 0,
          y: 0
        },
        buttonPosition: {
          align: "left",
          x: 0,
          y: 0
        },
        labelStyle: {
          color: "#666666"
        }
      }
    });
    // v.lang = n(v.lang, {
    //   rangeSelectorZoom: "Zoom",
    //   rangeSelectorFrom: "From",
    //   rangeSelectorTo: "To"
    // });

    // Español
    v.lang = n(v.lang, {
      rangeSelectorZoom: "Filtro",
      rangeSelectorFrom: "Desde",
      rangeSelectorTo: "a"
    });

    B.prototype = {
      clickButton: function(a, b) {
        var c = this,
          e = c.chart,
          g = c.buttonOptions[a],
          m = e.xAxis[0],
          n = e.scroller && e.scroller.getUnionExtremes() || m || {},
          d = n.dataMin,
          p = n.dataMax,
          r, k = m && Math.round(Math.min(m.max, f(p, m.max))),
          u = g.type,
          v, n = g._range,
          w, D, y, z = g.dataGrouping;
        if (null !== d && null !== p) {
          e.fixedRange = n;
          z && (this.forcedDataGrouping = !0, G.prototype.setDataGrouping.call(m || {
            chart: this.chart
          }, z, !1));
          if ("month" === u || "year" === u) m ? (u = {
            range: g,
            max: k,
            chart: e,
            dataMin: d,
            dataMax: p
          }, r = m.minFromRange.call(u), t(u.newMax) && (k = u.newMax)) : n = g;
          else if (n) r = Math.max(k - n, d), k = Math.min(r + n, p);
          else if ("ytd" === u)
            if (m) void 0 === p && (d = Number.MAX_VALUE, p = Number.MIN_VALUE, l(e.series, function(a) {
              a = a.xData;
              d = Math.min(a[0], d);
              p = Math.max(a[a.length - 1], p)
            }), b = !1), k = c.getYTDExtremes(p, d, e.time.useUTC), r = w = k.min, k = k.max;
            else {
              C(e, "beforeRender", function() {
                c.clickButton(a)
              });
              return
            }
          else "all" === u && m && (r = d, k = p);
          r += g._offsetMin;
          k += g._offsetMax;
          c.setSelected(a);
          m ? m.setExtremes(r, k, f(b, 1), null, {
            trigger: "rangeSelectorButton",
            rangeSelectorButton: g
          }) : (v = h(e.options.xAxis)[0], y = v.range, v.range = n, D = v.min, v.min = w, C(e, "load", function() {
            v.range = y;
            v.min = D
          }))
        }
      },


      setSelected: function(a) {
        this.selected = this.options.selected = a
      },

  //Filtros
      defaultButtons: [{
          type: "month",
          count: 1,
          text: "1m"
        }, {
          type: "month",
          count: 3,
          text: "3m"
        }, {
          type: "month",
          count: 6,
          text: "6m"
        }, {
          type: "ytd",
          text: "YTD"
        }, {
          type: "year",
          count: 1,
          text: "1a"
        },
        {
          type: "all",
          text: "Todo"
        }
      ],
      init: function(a) {
        var b = this,
          c = a.options.rangeSelector,
          f = c.buttons || [].concat(b.defaultButtons),
          g = c.selected,
          h = function() {
            var a = b.minInput,
              c = b.maxInput;
            a && a.blur && e(a, "blur");
            c && c.blur && e(c, "blur")
          };
        b.chart = a;
        b.options = c;
        b.buttons = [];
        a.extraTopMargin = c.height;
        b.buttonOptions = f;
        this.unMouseDown = C(a.container, "mousedown", h);
        this.unResize = C(a, "resize", h);
        l(f, b.computeButtonRange);
        void 0 !== g && f[g] && this.clickButton(g, !1);
        C(a, "load", function() {
          a.xAxis && a.xAxis[0] && C(a.xAxis[0],
            "setExtremes",
            function(c) {
              this.max - this.min !== a.fixedRange && "rangeSelectorButton" !== c.trigger && "updatedData" !== c.trigger && b.forcedDataGrouping && this.setDataGrouping(!1, !1)
            })
        })
      },
      updateButtonStates: function() {
        var a = this.chart,
          b = a.xAxis[0],
          c = Math.round(b.max - b.min),
          e = !b.hasVisibleSeries,
          f = a.scroller && a.scroller.getUnionExtremes() || b,
          g = f.dataMin,
          h = f.dataMax,
          a = this.getYTDExtremes(h, g, a.time.useUTC),
          d = a.min,
          m = a.max,
          n = this.selected,
          k = t(n),
          p = this.options.allButtonsEnabled,
          u = this.buttons;
        l(this.buttonOptions,
          function(a, f) {
            var l = a._range,
              q = a.type,
              r = a.count || 1,
              t = u[f],
              v = 0;
            a = a._offsetMax - a._offsetMin;
            f = f === n;
            var x = l > h - g,
              w = l < b.minRange,
              A = !1,
              y = !1,
              l = l === c;
            ("month" === q || "year" === q) && c + 36E5 >= 864E5 * {
              month: 28,
              year: 365
            }[q] * r - a && c - 36E5 <= 864E5 * {
              month: 31,
              year: 366
            }[q] * r + a ? l = !0 : "ytd" === q ? (l = m - d + a === c, A = !f) : "all" === q && (l = b.max - b.min >= h - g, y = !f && k && l);
            q = !p && (x || w || y || e);
            r = f && l || l && !k && !A;
            q ? v = 3 : r && (k = !0, v = 2);
            t.state !== v && t.setState(v)
          })
      },
      computeButtonRange: function(a) {
        var b = a.type,
          c = a.count || 1,
          e = {
            millisecond: 1,
            second: 1E3,
            minute: 6E4,
            hour: 36E5,
            day: 864E5,
            week: 6048E5
          };
        if (e[b]) a._range = e[b] * c;
        else if ("month" === b || "year" === b) a._range = 864E5 * {
          month: 30,
          year: 365
        }[b] * c;
        a._offsetMin = f(a.offsetMin, 0);
        a._offsetMax = f(a.offsetMax, 0);
        a._range += a._offsetMax - a._offsetMin
      },
      setInputValue: function(a, b) {
        var c = this.chart.options.rangeSelector,
          e = this.chart.time,
          f = this[a + "Input"];
        z(b) && (f.previousValue = f.HCTime, f.HCTime = b);
        f.value = e.dateFormat(c.inputEditDateFormat || "%Y-%m-%d", f.HCTime);
        this[a + "DateBox"].attr({
          text: e.dateFormat(c.inputDateFormat ||
            "%b %e, %Y", f.HCTime)
        })
      },
      showInput: function(a) {
        var b = this.inputGroup,
          c = this[a + "DateBox"];
        m(this[a + "Input"], {
          left: b.translateX + c.x + "px",
          top: b.translateY + "px",
          width: c.width - 2 + "px",
          height: c.height - 2 + "px",
          border: "2px solid silver"
        })
      },
      hideInput: function(a) {
        m(this[a + "Input"], {
          border: 0,
          width: "1px",
          height: "1px"
        });
        this.setInputValue(a)
      },
      drawInput: function(a) {
        function e() {
          var a = y.value,
            b = (u.inputDateParser || Date.parse)(a),
            d = h.xAxis[0],
            e = h.scroller && h.scroller.xAxis ? h.scroller.xAxis : d,
            g = e.dataMin,
            e = e.dataMax;
          b !== y.previousValue && (y.previousValue = b, t(b) || (b = a.split("-"), b = Date.UTC(c(b[0]), c(b[1]) - 1, c(b[2]))), t(b) && (h.time.useUTC || (b += 6E4 * (new Date).getTimezoneOffset()), w ? b > f.maxInput.HCTime ? b = void 0 : b < g && (b = g) : b < f.minInput.HCTime ? b = void 0 : b > e && (b = e), void 0 !== b && d.setExtremes(w ? b : d.min, w ? d.max : b, void 0, void 0, {
            trigger: "rangeSelectorInput"
          })))
        }
        var f = this,
          h = f.chart,
          l = h.renderer.style || {},
          p = h.renderer,
          u = h.options.rangeSelector,
          d = f.div,
          w = "min" === a,
          y, k, A = this.inputGroup;
        this[a + "Label"] = k = p.label(v.lang[w ? "rangeSelectorFrom" :
          "rangeSelectorTo"], this.inputGroup.offset).addClass("highcharts-range-label").attr({
          padding: 2
        }).add(A);
        A.offset += k.width + 5;
        this[a + "DateBox"] = p = p.label("", A.offset).addClass("highcharts-range-input").attr({
          padding: 2,

        //width inputs
          width: u.inputBoxWidth || 200,
          height: u.inputBoxHeight || 17,
          // width: u.inputBoxWidth || 90,
          // height: u.inputBoxHeight || 17,
          stroke: u.inputBoxBorderColor || "#cccccc",
          "stroke-width": 1,
          "text-align": "center"
        }).on("click", function() {
          f.showInput(a);
          f[a + "Input"].focus()
        }).add(A);
        A.offset += p.width + (w ? 10 : 0);
        this[a + "Input"] = y = g("input", {
          name: a,
          className: "highcharts-range-selector",
          // type: "text"
      //input date
          type: "date"
        }, {
          top: h.plotTop + "px"
        }, d);
        k.css(n(l, u.labelStyle));
        p.css(n({
          color: "#333333"
        }, l, u.inputStyle));
        m(y, b({
          position: "absolute",
          border: 0,
          width: "1px",
          height: "1px",
          padding: 0,
          textAlign: "center",
          fontSize: l.fontSize,
          fontFamily: l.fontFamily,
          top: "-9999em"
        }, u.inputStyle));
        y.onfocus = function() {
          f.showInput(a)
        };
        y.onblur = function() {
          f.hideInput(a)
        };
        y.onchange = e;
        y.onkeypress = function(a) {
          13 === a.keyCode && e()
        }
      },
      getPosition: function() {
        var a = this.chart,
          b = a.options.rangeSelector,
          a = "top" === b.verticalAlign ? a.plotTop -
          a.axisOffset[0] : 0;
        return {
          buttonTop: a + b.buttonPosition.y,
          inputTop: a + b.inputPosition.y - 10
        }
      },
      getYTDExtremes: function(a, b, c) {
        var e = this.chart.time,
          f = new e.Date(a),
          g = e.get("FullYear", f);
        c = c ? e.Date.UTC(g, 0, 1) : +new e.Date(g, 0, 1);
        b = Math.max(b || 0, c);
        f = f.getTime();
        return {
          max: Math.min(a || f, f),
          min: b
        }
      },
      render: function(a, b) {
        var c = this,
          e = c.chart,
          h = e.renderer,
          m = e.container,
          n = e.options,
          d = n.exporting && !1 !== n.exporting.enabled && n.navigation && n.navigation.buttonOptions,
          p = v.lang,
          r = c.div,
          k = n.rangeSelector,
          n = k.floating,
          t = c.buttons,
          r = c.inputGroup,
          u = k.buttonTheme,
          w = k.buttonPosition,
          y = k.inputPosition,
          z = k.inputEnabled,
          D = u && u.states,
          B = e.plotLeft,
          C, G = c.buttonGroup,
          L;
        L = c.rendered;
        var X = c.options.verticalAlign,
          Z = e.legend,
          aa = Z && Z.options,
          ba = w.y,
          Y = y.y,
          ca = L || !1,
          W = 0,
          T = 0,
          U;
        if (!1 !== k.enabled) {
          L || (c.group = L = h.g("range-selector-group").attr({
              zIndex: 7
            }).add(), c.buttonGroup = G = h.g("range-selector-buttons").add(L), c.zoomText = h.text(p.rangeSelectorZoom, f(B + w.x, B), 15).css(k.labelStyle).add(G), C = f(B + w.x, B) + c.zoomText.getBBox().width +
            5, l(c.buttonOptions, function(a, b) {
              t[b] = h.button(a.text, C, 0, function() {
                var d = a.events && a.events.click,
                  e;
                d && (e = d.call(a));
                !1 !== e && c.clickButton(b);
                c.isActive = !0
              }, u, D && D.hover, D && D.select, D && D.disabled).attr({
                "text-align": "center"
              }).add(G);
              C += t[b].width + f(k.buttonSpacing, 5)
            }), !1 !== z && (c.div = r = g("div", null, {
              position: "relative",
              height: 0,
              zIndex: 1
            }), m.parentNode.insertBefore(r, m), c.inputGroup = r = h.g("input-group").add(L), r.offset = 0, c.drawInput("min"), c.drawInput("max")));
          B = e.plotLeft - e.spacing[3];
          c.updateButtonStates();
          d && this.titleCollision(e) && "top" === X && "right" === w.align && w.y + G.getBBox().height - 12 < (d.y || 0) + d.height && (W = -40);
          "left" === w.align ? U = w.x - e.spacing[3] : "right" === w.align && (U = w.x + W - e.spacing[1]);
          G.align({
            y: w.y,
            width: G.getBBox().width,
            align: w.align,
            x: U
          }, !0, e.spacingBox);
          c.group.placed = ca;
          c.buttonGroup.placed = ca;
          !1 !== z && (W = d && this.titleCollision(e) && "top" === X && "right" === y.align && y.y - r.getBBox().height - 12 < (d.y || 0) + d.height + e.spacing[0] ? -40 : 0, "left" === y.align ? U = B : "right" === y.align && (U = -Math.max(e.axisOffset[1], -W)), r.align({
            y: y.y,
            width: r.getBBox().width,
            align: y.align,
            x: y.x + U - 2
          }, !0, e.spacingBox), m = r.alignAttr.translateX + r.alignOptions.x - W + r.getBBox().x + 2, d = r.alignOptions.width, p = G.alignAttr.translateX + G.getBBox().x, U = G.getBBox().width + 20, (y.align === w.align || p + U > m && m + d > p && ba < Y + r.getBBox().height) && r.attr({
            translateX: r.alignAttr.translateX + (e.axisOffset[1] >= -W ? 0 : -W),
            translateY: r.alignAttr.translateY + G.getBBox().height + 10
          }), c.setInputValue("min", a), c.setInputValue("max", b), c.inputGroup.placed = ca);
          c.group.align({
            verticalAlign: X
          }, !0, e.spacingBox);
          a = c.group.getBBox().height + 20;
          b = c.group.alignAttr.translateY;
          "bottom" === X && (Z = aa && "bottom" === aa.verticalAlign && aa.enabled && !aa.floating ? Z.legendHeight + f(aa.margin, 10) : 0, a = a + Z - 20, T = b - a - (n ? 0 : k.y) - 10);
          if ("top" === X) n && (T = 0), e.titleOffset && (T = e.titleOffset + e.options.title.margin), T += e.margin[0] - e.spacing[0] || 0;
          else if ("middle" === X)
            if (Y === ba) T = 0 > Y ? b + void 0 : b;
            else if (Y || ba) T = 0 > Y || 0 > ba ? T - Math.min(Y, ba) : b - a + NaN;
          c.group.translate(k.x, k.y + Math.floor(T));
          !1 !== z && (c.minInput.style.marginTop = c.group.translateY +
            "px", c.maxInput.style.marginTop = c.group.translateY + "px");
          c.rendered = !0
        }
      },
      getHeight: function() {
        var a = this.options,
          b = this.group,
          c = a.y,
          e = a.buttonPosition.y,
          a = a.inputPosition.y,
          b = b ? b.getBBox(!0).height + 13 + c : 0,
          c = Math.min(a, e);
        if (0 > a && 0 > e || 0 < a && 0 < e) b += Math.abs(c);
        return b
      },
      titleCollision: function(a) {
        return !(a.options.title.text || a.options.subtitle.text)
      },
      update: function(a) {
        var b = this.chart;
        n(!0, b.options.rangeSelector, a);
        this.destroy();
        this.init(b);
        b.rangeSelector.render()
      },
      destroy: function() {
        var b = this,
          c = b.minInput,
          e = b.maxInput;
        b.unMouseDown();
        b.unResize();
        u(b.buttons);
        c && (c.onfocus = c.onblur = c.onchange = null);
        e && (e.onfocus = e.onblur = e.onchange = null);
        a.objectEach(b, function(a, c) {
          a && "chart" !== c && (a.destroy ? a.destroy() : a.nodeType && y(this[c]));
          a !== B.prototype[c] && (b[c] = null)
        }, this)
      }
    };
    G.prototype.toFixedRange = function(a, b, c, e) {
      var g = this.chart && this.chart.fixedRange;
      a = f(c, this.translate(a, !0, !this.horiz));
      b = f(e, this.translate(b, !0, !this.horiz));
      c = g && (b - a) / g;
      .7 < c && 1.3 > c && (e ? a = b - g : b = a + g);
      t(a) && t(b) || (a =
        b = void 0);
      return {
        min: a,
        max: b
      }
    };
    G.prototype.minFromRange = function() {
      var a = this.range,
        b = {
          month: "Month",
          year: "FullYear"
        }[a.type],
        c, e = this.max,
        g, h, l = function(a, c) {
          var d = new Date(a),
            e = d["get" + b]();
          d["set" + b](e + c);
          e === d["get" + b]() && d.setDate(0);
          return d.getTime() - a
        };
      t(a) ? (c = e - a, h = a) : (c = e + l(e, -a.count), this.chart && (this.chart.fixedRange = e - c));
      g = f(this.dataMin, Number.MIN_VALUE);
      t(c) || (c = g);
      c <= g && (c = g, void 0 === h && (h = l(c, a.count)), this.newMax = Math.min(c + h, this.dataMax));
      t(e) || (c = void 0);
      return c
    };
    C(p, "afterGetContainer",
      function() {
        this.options.rangeSelector.enabled && (this.rangeSelector = new B(this))
      });
    w(p.prototype, "render", function(a, b, c) {
      var e = this.axes,
        f = this.rangeSelector;
      f && (l(e, function(a) {
        a.updateNames();
        a.setScale()
      }), this.getAxisMargins(), f.render(), e = f.options.verticalAlign, f.options.floating || ("bottom" === e ? this.extraBottomMargin = !0 : "middle" !== e && (this.extraTopMargin = !0)));
      a.call(this, b, c)
    });
    C(p, "update", function(a) {
      var b = a.options;
      a = this.rangeSelector;
      this.extraTopMargin = this.extraBottomMargin = !1;
      this.isDirtyBox = !0;
      a && (a.render(), b = b.rangeSelector && b.rangeSelector.verticalAlign || a.options && a.options.verticalAlign, a.options.floating || ("bottom" === b ? this.extraBottomMargin = !0 : "middle" !== b && (this.extraTopMargin = !0)))
    });
    w(p.prototype, "redraw", function(a, b, c) {
      var e = this.rangeSelector;
      e && !e.options.floating && (e.render(), e = e.options.verticalAlign, "bottom" === e ? this.extraBottomMargin = !0 : "middle" !== e && (this.extraTopMargin = !0));
      a.call(this, b, c)
    });
    p.prototype.adjustPlotArea = function() {
      var a = this.rangeSelector;
      this.rangeSelector &&
        (a = a.getHeight(), this.extraTopMargin && (this.plotTop += a), this.extraBottomMargin && (this.marginBottom += a))
    };
    p.prototype.callbacks.push(function(a) {
      function b() {
        c = a.xAxis[0].getExtremes();
        t(c.min) && e.render(c.min, c.max)
      }
      var c, e = a.rangeSelector,
        f, g;
      e && (g = C(a.xAxis[0], "afterSetExtremes", function(a) {
        e.render(a.min, a.max)
      }), f = C(a, "redraw", b), b());
      C(a, "destroy", function() {
        e && (f(), g())
      })
    });
    a.RangeSelector = B
  })(L);
  (function(a) {
    var B = a.addEvent,
      C = a.arrayMax,
      G = a.arrayMin,
      p = a.Axis,
      m = a.Chart,
      g = a.defined,
      v = a.each,
      z = a.extend,
      u = a.format,
      y = a.grep,
      l = a.inArray,
      b = a.isNumber,
      e = a.isString,
      t = a.map,
      n = a.merge,
      f = a.pick,
      c = a.Point,
      h = a.Renderer,
      w = a.Series,
      D = a.splat,
      r = a.SVGRenderer,
      J = a.VMLRenderer,
      q = a.wrap,
      F = w.prototype,
      x = F.init,
      K = F.processData,
      d = c.prototype.tooltipFormatter;
    a.StockChart = a.stockChart = function(b, c, d) {
      var g = e(b) || b.nodeName,
        k = arguments[g ? 1 : 0],
        h = k.series,
        l = a.getOptions(),
        p, q = f(k.navigator && k.navigator.enabled, l.navigator.enabled, !0),
        r = q ? {
          startOnTick: !1,
          endOnTick: !1
        } : null,
        u = {
          marker: {
            enabled: !1,
            radius: 2
          }
        },
        v = {
          shadow: !1,
          borderWidth: 0
        };
      k.xAxis = t(D(k.xAxis || {}), function(a, b) {
        return n({
          minPadding: 0,
          maxPadding: 0,
          overscroll: 0,
          ordinal: !0,
          title: {
            text: null
          },
          labels: {
            overflow: "justify"
          },
          showLastLabel: !0
        }, l.xAxis, l.xAxis && l.xAxis[b], a, {
          type: "datetime",
          categories: null
        }, r)
      });
      k.yAxis = t(D(k.yAxis || {}), function(a, b) {
        p = f(a.opposite, !0);
        return n({
          labels: {
            y: -2
          },
          opposite: p,
          showLastLabel: !(!a.categories && "category" !== a.type),
          title: {
            text: null
          }
        }, l.yAxis, l.yAxis && l.yAxis[b], a)
      });
      k.series = null;
      k = n({
        chart: {
          panning: !0,
          pinchType: "x"
        },
        navigator: {
          enabled: q
        },
        scrollbar: {
          enabled: f(l.scrollbar.enabled, !0)
        },
        rangeSelector: {
          enabled: f(l.rangeSelector.enabled, !0)
        },
        title: {
          text: null
        },
        tooltip: {
          split: f(l.tooltip.split, !0),
          crosshairs: !0
        },
        legend: {
          enabled: !1
        },
        plotOptions: {
          line: u,
          spline: u,
          area: u,
          areaspline: u,
          arearange: u,
          areasplinerange: u,
          column: v,
          columnrange: v,
          candlestick: v,
          ohlc: v
        }
      }, k, {
        isStock: !0
      });
      k.series = h;
      return g ? new m(b, k, d) : new m(k, c)
    };
    q(p.prototype, "autoLabelAlign", function(a) {
      var b = this.chart,
        c = this.options,
        b = b._labelPanes = b._labelPanes || {},
        d = this.options.labels;
      return this.chart.options.isStock && "yAxis" === this.coll && (c = c.top + "," + c.height, !b[c] && d.enabled) ? (15 === d.x && (d.x = 0), void 0 === d.align && (d.align = "right"), b[c] = this, "right") : a.apply(this, [].slice.call(arguments, 1))
    });
    B(p, "destroy", function() {
      var a = this.chart,
        b = this.options && this.options.top + "," + this.options.height;
      b && a._labelPanes && a._labelPanes[b] === this && delete a._labelPanes[b]
    });
    q(p.prototype, "getPlotLinePath", function(c, d, k, h, m, n) {
      var p = this,
        q = this.isLinked && !this.series ? this.linkedParent.series :
        this.series,
        r = p.chart,
        u = r.renderer,
        w = p.left,
        x = p.top,
        y, A, z, E, B = [],
        D = [],
        C, H;
      if ("xAxis" !== p.coll && "yAxis" !== p.coll) return c.apply(this, [].slice.call(arguments, 1));
      D = function(a) {
        var c = "xAxis" === a ? "yAxis" : "xAxis";
        a = p.options[c];
        return b(a) ? [r[c][a]] : e(a) ? [r.get(a)] : t(q, function(a) {
          return a[c]
        })
      }(p.coll);
      v(p.isXAxis ? r.yAxis : r.xAxis, function(a) {
        if (g(a.options.id) ? -1 === a.options.id.indexOf("navigator") : 1) {
          var b = a.isXAxis ? "yAxis" : "xAxis",
            b = g(a.options[b]) ? r[b][a.options[b]] : r[b][0];
          p === b && D.push(a)
        }
      });
      C = D.length ? [] : [p.isXAxis ? r.yAxis[0] : r.xAxis[0]];
      v(D, function(b) {
        -1 !== l(b, C) || a.find(C, function(a) {
          return a.pos === b.pos && a.len && b.len
        }) || C.push(b)
      });
      H = f(n, p.translate(d, null, null, h));
      b(H) && (p.horiz ? v(C, function(a) {
        var b;
        A = a.pos;
        E = A + a.len;
        y = z = Math.round(H + p.transB);
        if (y < w || y > w + p.width) m ? y = z = Math.min(Math.max(w, y), w + p.width) : b = !0;
        b || B.push("M", y, A, "L", z, E)
      }) : v(C, function(a) {
        var b;
        y = a.pos;
        z = y + a.len;
        A = E = Math.round(x + p.height - H);
        if (A < x || A > x + p.height) m ? A = E = Math.min(Math.max(x, A), p.top + p.height) : b = !0;
        b || B.push("M",
          y, A, "L", z, E)
      }));
      return 0 < B.length ? u.crispPolyLine(B, k || 1) : null
    });
    r.prototype.crispPolyLine = function(a, b) {
      var c;
      for (c = 0; c < a.length; c += 6) a[c + 1] === a[c + 4] && (a[c + 1] = a[c + 4] = Math.round(a[c + 1]) - b % 2 / 2), a[c + 2] === a[c + 5] && (a[c + 2] = a[c + 5] = Math.round(a[c + 2]) + b % 2 / 2);
      return a
    };
    h === J && (J.prototype.crispPolyLine = r.prototype.crispPolyLine);
    q(p.prototype, "hideCrosshair", function(a, b) {
      a.call(this, b);
      this.crossLabel && (this.crossLabel = this.crossLabel.hide())
    });
    B(p, "afterDrawCrosshair", function(a) {
      var b, c;
      if (g(this.crosshair.label) &&
        this.crosshair.label.enabled && this.cross) {
        var d = this.chart,
          e = this.options.crosshair.label,
          h = this.horiz;
        b = this.opposite;
        c = this.left;
        var l = this.top,
          m = this.crossLabel,
          n = e.format,
          p = "",
          q = "inside" === this.options.tickPosition,
          r = !1 !== this.crosshair.snap,
          t = 0,
          v = a.e || this.cross && this.cross.e,
          w = a.point;
        a = h ? "center" : b ? "right" === this.labelAlign ? "right" : "left" : "left" === this.labelAlign ? "left" : "center";
        m || (m = this.crossLabel = d.renderer.label(null, null, null, e.shape || "callout").addClass("highcharts-crosshair-label" +
          (this.series[0] && " highcharts-color-" + this.series[0].colorIndex)).attr({
          align: e.align || a,
          padding: f(e.padding, 8),
          r: f(e.borderRadius, 3),
          zIndex: 2
        }).add(this.labelGroup), m.attr({
          fill: e.backgroundColor || this.series[0] && this.series[0].color || "#666666",
          stroke: e.borderColor || "",
          "stroke-width": e.borderWidth || 0
        }).css(z({
          color: "#ffffff",
          fontWeight: "normal",
          fontSize: "11px",
          textAlign: "center"
        }, e.style)));
        h ? (a = r ? w.plotX + c : v.chartX, l += b ? 0 : this.height) : (a = b ? this.width + c : 0, l = r ? w.plotY + l : v.chartY);
        n || e.formatter ||
          (this.isDatetimeAxis && (p = "%b %d, %Y"), n = "{value" + (p ? ":" + p : "") + "}");
        p = r ? w[this.isXAxis ? "x" : "y"] : this.toValue(h ? v.chartX : v.chartY);
        m.attr({
          text: n ? u(n, {
            value: p
          }, d.time) : e.formatter.call(this, p),
          x: a,
          y: l,
          visibility: p < this.min || p > this.max ? "hidden" : "visible"
        });
        e = m.getBBox();
        if (h) {
          if (q && !b || !q && b) l = m.y - e.height
        } else l = m.y - e.height / 2;
        h ? (b = c - e.x, c = c + this.width - e.x) : (b = "left" === this.labelAlign ? c : 0, c = "right" === this.labelAlign ? c + this.width : d.chartWidth);
        m.translateX < b && (t = b - m.translateX);
        m.translateX + e.width >=
          c && (t = -(m.translateX + e.width - c));
        m.attr({
          x: a + t,
          y: l,
          anchorX: h ? a : this.opposite ? 0 : d.chartWidth,
          anchorY: h ? this.opposite ? d.chartHeight : 0 : l + e.height / 2
        })
      }
    });
    F.init = function() {
      x.apply(this, arguments);
      this.setCompare(this.options.compare)
    };
    F.setCompare = function(a) {
      this.modifyValue = "value" === a || "percent" === a ? function(b, c) {
        var d = this.compareValue;
        if (void 0 !== b && void 0 !== d) return b = "value" === a ? b - d : b / d * 100 - (100 === this.options.compareBase ? 0 : 100), c && (c.change = b), b
      } : null;
      this.userOptions.compare = a;
      this.chart.hasRendered &&
        (this.isDirty = !0)
    };
    F.processData = function() {
      var a, c = -1,
        d, e, f = !0 === this.options.compareStart ? 0 : 1,
        g, h;
      K.apply(this, arguments);
      if (this.xAxis && this.processedYData)
        for (d = this.processedXData, e = this.processedYData, g = e.length, this.pointArrayMap && (c = l("close", this.pointArrayMap), -1 === c && (c = l(this.pointValKey || "y", this.pointArrayMap))), a = 0; a < g - f; a++)
          if (h = e[a] && -1 < c ? e[a][c] : e[a], b(h) && d[a + f] >= this.xAxis.min && 0 !== h) {
            this.compareValue = h;
            break
          }
    };
    q(F, "getExtremes", function(a) {
      var b;
      a.apply(this, [].slice.call(arguments,
        1));
      this.modifyValue && (b = [this.modifyValue(this.dataMin), this.modifyValue(this.dataMax)], this.dataMin = G(b), this.dataMax = C(b))
    });
    p.prototype.setCompare = function(a, b) {
      this.isXAxis || (v(this.series, function(b) {
        b.setCompare(a)
      }), f(b, !0) && this.chart.redraw())
    };
    c.prototype.tooltipFormatter = function(b) {
      b = b.replace("{point.change}", (0 < this.change ? "+" : "") + a.numberFormat(this.change, f(this.series.tooltipOptions.changeDecimals, 2)));
      return d.apply(this, [b])
    };
    q(w.prototype, "render", function(a) {
      this.chart.is3d &&
        this.chart.is3d() || this.chart.polar || !this.xAxis || this.xAxis.isRadial || (!this.clipBox && this.animate ? (this.clipBox = n(this.chart.clipBox), this.clipBox.width = this.xAxis.len, this.clipBox.height = this.yAxis.len) : this.chart[this.sharedClipKey] ? this.chart[this.sharedClipKey].attr({
          width: this.xAxis.len,
          height: this.yAxis.len
        }) : this.clipBox && (this.clipBox.width = this.xAxis.len, this.clipBox.height = this.yAxis.len));
      a.call(this)
    });
    q(m.prototype, "getSelectedPoints", function(a) {
      var b = a.call(this);
      v(this.series, function(a) {
        a.hasGroupedData &&
          (b = b.concat(y(a.points || [], function(a) {
            return a.selected
          })))
      });
      return b
    });
    B(m, "update", function(a) {
      a = a.options;
      "scrollbar" in a && this.navigator && (n(!0, this.options.scrollbar, a.scrollbar), this.navigator.update({}, !1), delete a.scrollbar)
    })
  })(L);
  return L
});

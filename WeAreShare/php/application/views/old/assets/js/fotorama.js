/*!
 * Fotorama 4.2.3 | http://fotorama.io/license/
 */
! function (a, b, c, d) {
    "use strict";

    function e(a) {
        var b = "bez_" + c.makeArray(arguments).join("_").replace(".", "p");
        if ("function" != typeof c.easing[b]) {
            var d = function (a, b) {
                var c = [null, null],
                    d = [null, null],
                    e = [null, null],
                    f = function (f, g) {
                        return e[g] = 3 * a[g], d[g] = 3 * (b[g] - a[g]) - e[g], c[g] = 1 - e[g] - d[g], f * (e[g] + f * (d[g] + f * c[g]))
                    }, g = function (a) {
                        return e[0] + a * (2 * d[0] + 3 * c[0] * a)
                    }, h = function (a) {
                        for (var b, c = a, d = 0; ++d < 14 && (b = f(c, 0) - a, !(Math.abs(b) < .001));) c -= b / g(c);
                        return c
                    };
                return function (a) {
                    return f(h(a), 1)
                }
            };
            c.easing[b] = function (b, c, e, f, g) {
                return f * d([a[0], a[1]], [a[2], a[3]])(c / g) + e
            }
        }
        return b
    }

    function f() {}

    function g(a, b, c) {
        return Math.max(isNaN(b) ? -1 / 0 : b, Math.min(isNaN(c) ? 1 / 0 : c, a))
    }

    function h(a) {
        return a.match(/^m/) && a.match(/-?\d+/g)[4]
    }

    function i(a) {
        return lc ? +h(a.css("transform")) : +a.css("left").replace("px", "")
    }

    function j(a) {
        var b = {};
        return lc ? b.transform = "translate3d(" + a + "px,0,0)" : b.left = a, b
    }

    function k(a) {
        return {
            "transition-duration": a + "ms"
        }
    }

    function l(a, b) {
        return +String(a).replace(b || "px", "")
    }

    function m(a) {
        return /%$/.test(a) && l(a, "%")
    }

    function n(a) {
        return ( !! l(a) || !! l(a, "%")) && a
    }

    function o(a, b, c, d) {
        return (a - (d || 0)) * (b + (c || 0))
    }

    function p(a, b, c, d) {
        return -Math.round(a / (b + (c || 0)) - (d || 0))
    }

    function q(a) {
        var b = a.data();
        if (!b.tEnd) {
            var c = a[0],
                d = {
                    WebkitTransition: "webkitTransitionEnd",
                    MozTransition: "transitionend",
                    OTransition: "oTransitionEnd otransitionend",
                    msTransition: "MSTransitionEnd",
                    transition: "transitionend"
                };
            c.addEventListener(d[T.prefixed("transition")], function (a) {
                b.tProp && a.propertyName.match(b.tProp) && b.onEndFn.call(this)
            }), b.tEnd = !0
        }
    }

    function r(a, b, c) {
        var d, e = a.data();
        e && (e.onEndFn = function () {
            d || (c.call(this), d = !0)
        }, e.tProp = b, q(a))
    }

    function s(a, b) {
        if (a.length) {
            lc ? a.css(k(0)).data("onEndFn", f) : a.stop();
            var c = b || i(a);
            return a.css(j(c)), c
        }
    }

    function t(a, b) {
        return Math.round(a + (b - a) / 1.5)
    }

    function u() {
        return u.p = u.p || ("https://" === location.protocol ? "https://" : "http://"), u.p
    }

    function v(a) {
        var c = b.createElement("a");
        return c.href = a, c
    }

    function w(a, b) {
        if ("string" != typeof a) return a;
        a = v(a);
        var c, d;
        if (a.host.match(/youtube\.com/) && a.search) {
            if (c = a.search.split("v=")[1]) {
                var e = c.indexOf("&"); - 1 !== e && (c = c.substring(0, e)), d = "youtube"
            }
        } else a.host.match(/youtube\.com|youtu\.be/) ? (c = a.pathname.replace(/^\/(embed\/|v\/)?/, "").replace(/\/.*/, ""), d = "youtube") : a.host.match(/vimeo\.com/) && (d = "vimeo", c = a.pathname.replace(/^\/(video\/)?/, "").replace(/\/.*/, ""));
        return c && d || !b || (c = a.href, d = "custom"), c ? {
            id: c,
            type: d
        } : !1
    }

    function x(a, b, d) {
        var e, f, g = a.video;
        return "youtube" === g.type ? (f = u() + "img.youtube.com/vi/" + g.id + "/default.jpg", e = f.replace(/\/default.jpg$/, "/hqdefault.jpg"), a.thumbsReady = !0) : "vimeo" === g.type ? c.ajax({
            url: u() + "vimeo.com/api/v2/video/" + g.id + ".json",
            dataType: "jsonp",
            success: function (c) {
                a.thumbsReady = !0, y(b, {
                    img: c[0].thumbnail_large,
                    thumb: c[0].thumbnail_small
                }, a.i, d)
            }
        }) : a.thumbsReady = !0, {
            img: e,
            thumb: f
        }
    }

    function y(a, b, d, e) {
        for (var f = 0, g = a.length; g > f; f++) {
            var h = a[f];
            if (h.i === d && h.thumbsReady) {
                var i = {
                    videoReady: !0
                };
                i[uc] = i[wc] = i[vc] = !1, e.splice(f, 1, c.extend({}, h, i, b));
                break
            }
        }
    }

    function z(a) {
        function b(a, b) {
            var c = a.data(),
                e = a.children("img").eq(0),
                f = a.attr("href"),
                g = a.attr("src"),
                h = e.attr("src"),
                i = c.video,
                j = b ? w(f, i === !0) : !1;
            j ? f = !1 : j = w(i, i);
            var k = c.img || f || g || h,
                m = c.thumb || h || g || f,
                n = k !== m,
                o = l(c.width || a.attr("width")),
                p = l(c.height || a.attr("height")),
                q = l(c.thumbWidth || e.attr("width") || n || o),
                r = l(c.thumbHeight || e.attr("height") || n || p);
            return {
                video: j,
                img: k,
                width: o || d,
                height: p || d,
                thumb: m,
                thumbRatio: q / r || d
            }
        }
        var e = [];
        return a.children().each(function () {
            var a = c(this),
                d = c.extend(a.data(), {
                    id: a.attr("id")
                });
            if (a.is("a, img")) c.extend(d, b(a, !0));
            else {
                if (a.is(":empty")) return;
                c.extend(d, {
                    html: this,
                    _html: a.html()
                })
            }
            e.push(d)
        }), e
    }

    function A(a) {
        return 0 === a.offsetWidth && 0 === a.offsetHeight
    }

    function B(a) {
        return !c.contains(b.documentElement, a)
    }

    function C(a, b, c) {
        a() ? b() : setTimeout(function () {
            C(a, b)
        }, c || 100)
    }

    function D(a) {
        location.replace(location.protocol + "//" + location.host + location.pathname.replace(/^\/?/, "/") + location.search + "#" + a)
    }

    function E(a, b, c) {
        var d = a.data(),
            e = d.measures;
        if (e && (!d.l || d.l.W !== e.width || d.l.H !== e.height || d.l.r !== e.ratio || d.l.w !== b.w || d.l.h !== b.h || d.l.m !== c)) {
            var f = e.width,
                h = e.height,
                i = b.w / b.h,
                j = e.ratio >= i,
                k = "scale-down" === c,
                l = "contain" === c,
                m = "cover" === c;
            j && (k || l) || !j && m ? (f = g(b.w, 0, k ? f : 1 / 0), h = f / e.ratio) : (j && m || !j && (k || l)) && (h = g(b.h, 0, k ? h : 1 / 0), f = h * e.ratio), a.css({
                width: Math.ceil(f),
                height: Math.ceil(h),
                marginLeft: Math.floor(-f / 2),
                marginTop: Math.floor(-h / 2)
            }), d.l = {
                W: e.width,
                H: e.height,
                r: e.ratio,
                w: b.w,
                h: b.h,
                m: c
            }
        }
        return !0
    }

    function F(a, b) {
        var c = a[0];
        c.styleSheet ? c.styleSheet.cssText = b : a.html(b)
    }

    function G(a, b, c) {
        return b === c ? !1 : b >= a ? "left" : a >= c ? "right" : "left right"
    }

    function H(a, b, c) {
        if (!c) return !1;
        if (!isNaN(a)) return a - 1;
        for (var d, e = 0, f = b.length; f > e; e++) {
            var g = b[e];
            if (g.id === a) {
                d = e;
                break
            }
        }
        return d
    }

    function I(a, b, d) {
        d = d || {}, a.each(function () {
            var a, e = c(this),
                g = e.data();
            g.clickOn || (g.clickOn = !0, c.extend(O(e, {
                onStart: function (b) {
                    a = b, (d.onStart || f).call(this, b)
                },
                onMove: d.onMove || f,
                onEnd: function (c) {
                    c.moved || d.tail.checked || b.call(this, a)
                }
            }), d.tail))
        })
    }

    function J(a, b) {
        return '<div class="' + a + '">' + (b || "") + "</div>"
    }

    function K(a) {
        for (var b = a.length; b;) {
            var c = Math.floor(Math.random() * b--),
                d = a[b];
            a[b] = a[c], a[c] = d
        }
        return a
    }

    function L(a, b) {
        var d = Math.round(b.pos),
            e = b.onEnd || f;
        "undefined" != typeof b.overPos && b.overPos !== b.pos && (d = b.overPos, e = function () {
            L(a, c.extend({}, b, {
                overPos: b.pos,
                time: Math.max(oc, b.time / 2)
            }))
        });
        var g = c.extend(j(d), {
            width: b.width
        });
        lc ? (a.css(c.extend(k(b.time), g)), b.time > 10 ? r(a, "transform", e, b.time) : e()) : a.stop().animate(g, b.time, xc, e)
    }

    function M(a, b, d, e) {
        a = a || c(a), b = b || c(b);
        var g = a[0],
            h = b[0],
            i = "crossfade" === e.method,
            j = function () {
                j.done || ((e.onEnd || f)(), j.done = !0)
            }, l = k(e.time),
            m = k(0),
            n = {
                opacity: 0
            }, o = {
                opacity: 1
            };
        d.removeClass(Ib + " " + Hb), a.addClass(Ib), b.addClass(Hb), lc ? (s(a), s(b), i && h && a.css(c.extend(m, n)).width(), a.css(c.extend(i ? l : m, o)), b.css(c.extend(l, n)), e.time > 10 && (g || h) ? (r(a, "opacity", j, e.time), r(b, "opacity", j, e.time)) : j()) : (a.stop(), b.stop(), i && h && a.fadeTo(0, 0), a.fadeTo(i ? e.time : 0, 1, i && j), b.fadeTo(e.time, 0, j), g && i || h || j())
    }

    function N(a, b) {
        a._x = b ? a.touches[0].pageX : a.pageX, a._y = b ? a.touches[0].pageY : a.pageY
    }

    function O(a, b) {
        function d(a) {
            return l = c(a.target), r.checked = i = k = o = p = !1, h || r.flow || a.touches && a.touches.length > 1 || a.which > 1 || $ && $.type !== a.type && ab || (o = b.select && l.is(b.select, q)) ? o : (n = a.type.match("touch"), p = l.is("a, a *", q), N(a, n), $ = a, _ = a.type.replace(/down|start/, "move"), j = a, m = r.control, (b.onStart || f).call(q, a, {
                control: m,
                $target: l
            }), r.flow = h = !0, n || a.preventDefault(), void 0)
        }

        function e(a) {
            if (!h || a.touches && a.touches.length > 1) return g(), void 0;
            if (_ === a.type) {
                N(a, n);
                var c = Math.abs(a._x - j._x),
                    d = Math.abs(a._y - j._y),
                    e = c - d,
                    l = !r.stable || e >= 3,
                    m = -3 >= e;
                k = k || l || m, n && !r.checked ? ((l || m) && (r.checked = !0, i = l), (!r.checked || i) && a.preventDefault()) : !n || i ? (a.preventDefault(), (b.onMove || f).call(q, a, {
                    touch: n
                })) : h = !1, r.checked = r.checked || l || m
            }
        }

        function g(a) {
            var c = h;
            r.flow = r.control = h = !1, !c || p && !r.checked || (a && a.preventDefault(), ab = !0, clearTimeout(bb), bb = setTimeout(function () {
                ab = !1
            }, 1e3), (b.onEnd || f).call(q, {
                moved: k,
                $target: l,
                control: m,
                startEvent: j,
                aborted: !a,
                touch: n
            }))
        }
        var h, i, j, k, l, m, n, o, p, q = a[0],
            r = {};
        return q.addEventListener && (q.addEventListener("touchstart", d), q.addEventListener("touchmove", e), q.addEventListener("touchend", g)), a.on("mousedown", d), ic.on("mousemove", e).on("mouseup", g), a.on("click", "a", function (a) {
            r.checked && a.preventDefault()
        }), r
    }

    function P(a, b) {
        function d(c) {
            k = l = c._x, p = [
                [+new Date, k]
            ], m = n = s(a, b.getPos && b.getPos()), z = C.stable = !(m % v), !z && c.preventDefault(), (b.onStart || f).call(A, c, {
                pos: m
            })
        }

        function e(a, b) {
            r = B.minPos, u = B.maxPos, v = B.snap, w = a.altKey, y = !1, x = b.control, x || d(a)
        }

        function h(c, e) {
            x && (x = !1, d(c)), C.noSwipe || (l = c._x, p.push([(new Date).getTime(), l]), n = m - (k - l), o = G(n, r, u), r >= n ? n = t(n, r) : n >= u && (n = t(n, u)), C.noMove || (a.css(j(n)), y || (y = !0, e.touch || a.addClass(Xb)), (b.onMove || f).call(A, c, {
                pos: n,
                edge: o
            })))
        }

        function i(d) {
            if (!x) {
                d.touch || a.removeClass(Xb), q = (new Date).getTime();
                for (var e, h, i, j, k, o, s, t, y, z = q - nc, B = null, C = oc, D = b.friction, E = p.length - 1; E >= 0; E--) {
                    if (e = p[E][0], h = Math.abs(e - z), null === B || i > h) B = e, j = p[E][1];
                    else if (B === z || h > i) break;
                    i = h
                }
                s = g(n, r, u);
                var F = j - l,
                    G = F >= 0,
                    H = q - B,
                    I = H > nc,
                    J = !I && n !== m && s === n;
                v && (s = g(Math[J ? G ? "floor" : "ceil" : "round"](n / v) * v, r, u), r = u = s), J && (v || s === n) && (y = -(F / H), C *= g(Math.abs(y), b.timeLow, b.timeHigh), k = Math.round(n + y * C / D), v || (s = k), (!G && k > u || G && r > k) && (o = G ? r : u, t = k - o, v || (s = o), t = g(s + .03 * t, o - 50, o + 50), C = Math.abs((n - t) / (y / D)))), C *= w ? 10 : 1, (b.onEnd || f).call(A, c.extend(d, {
                    pos: n,
                    newPos: s,
                    overPos: t,
                    time: C,
                    moved: I && v || d.moved
                }))
            }
        }
        var k, l, m, n, o, p, q, r, u, v, w, x, y, z, A = a[0],
            B = a.data(),
            C = {};
        return C = c.extend(O(b.$wrap, {
            onStart: e,
            onMove: h,
            onEnd: i,
            select: b.select,
            control: b.control
        }), C)
    }

    function Q(a) {
        R(!0), yc.appendTo(a), db = 0, zc(), cb = setInterval(zc, 200)
    }

    function R(a) {
        a || yc.detach(), clearInterval(cb)
    }
    var S = {}, T = function (a, b, c) {
            function d(a) {
                r.cssText = a
            }

            function e(a, b) {
                return typeof a === b
            }

            function f(a, b) {
                return !!~("" + a).indexOf(b)
            }

            function g(a, b) {
                for (var d in a) {
                    var e = a[d];
                    if (!f(e, "-") && r[e] !== c) return "pfx" == b ? e : !0
                }
                return !1
            }

            function h(a, b, d) {
                for (var f in a) {
                    var g = b[a[f]];
                    if (g !== c) return d === !1 ? a[f] : e(g, "function") ? g.bind(d || b) : g
                }
                return !1
            }

            function i(a, b, c) {
                var d = a.charAt(0).toUpperCase() + a.slice(1),
                    f = (a + " " + u.join(d + " ") + d).split(" ");
                return e(b, "string") || e(b, "undefined") ? g(f, b) : (f = (a + " " + v.join(d + " ") + d).split(" "), h(f, b, c))
            }
            var j, k, l, m = "2.6.2",
                n = {}, o = b.documentElement,
                p = "modernizr",
                q = b.createElement(p),
                r = q.style,
                s = ({}.toString, " -webkit- -moz- -o- -ms- ".split(" ")),
                t = "Webkit Moz O ms",
                u = t.split(" "),
                v = t.toLowerCase().split(" "),
                w = {}, x = [],
                y = x.slice,
                z = function (a, c, d, e) {
                    var f, g, h, i, j = b.createElement("div"),
                        k = b.body,
                        l = k || b.createElement("body");
                    if (parseInt(d, 10))
                        for (; d--;) h = b.createElement("div"), h.id = e ? e[d] : p + (d + 1), j.appendChild(h);
                    return f = ["&#173;", '<style id="s', p, '">', a, "</style>"].join(""), j.id = p, (k ? j : l).innerHTML += f, l.appendChild(j), k || (l.style.background = "", l.style.overflow = "hidden", i = o.style.overflow, o.style.overflow = "hidden", o.appendChild(l)), g = c(j, a), k ? j.parentNode.removeChild(j) : (l.parentNode.removeChild(l), o.style.overflow = i), !! g
                }, A = {}.hasOwnProperty;
            l = e(A, "undefined") || e(A.call, "undefined") ? function (a, b) {
                return b in a && e(a.constructor.prototype[b], "undefined")
            } : function (a, b) {
                return A.call(a, b)
            }, Function.prototype.bind || (Function.prototype.bind = function (a) {
                var b = this;
                if ("function" != typeof b) throw new TypeError;
                var c = y.call(arguments, 1),
                    d = function () {
                        if (this instanceof d) {
                            var e = function () {};
                            e.prototype = b.prototype;
                            var f = new e,
                                g = b.apply(f, c.concat(y.call(arguments)));
                            return Object(g) === g ? g : f
                        }
                        return b.apply(a, c.concat(y.call(arguments)))
                    };
                return d
            }), w.csstransforms3d = function () {
                var a = !! i("perspective");
                return a
            };
            for (var B in w) l(w, B) && (k = B.toLowerCase(), n[k] = w[B](), x.push((n[k] ? "" : "no-") + k));
            return n.addTest = function (a, b) {
                if ("object" == typeof a)
                    for (var d in a) l(a, d) && n.addTest(d, a[d]);
                else {
                    if (a = a.toLowerCase(), n[a] !== c) return n;
                    b = "function" == typeof b ? b() : b, "undefined" != typeof enableClasses && enableClasses && (o.className += " " + (b ? "" : "no-") + a), n[a] = b
                }
                return n
            }, d(""), q = j = null, n._version = m, n._prefixes = s, n._domPrefixes = v, n._cssomPrefixes = u, n.testProp = function (a) {
                return g([a])
            }, n.testAllProps = i, n.testStyles = z, n.prefixed = function (a, b, c) {
                return b ? i(a, b, c) : i(a, "pfx")
            }, n
        }(a, b),
        U = {
            ok: !1,
            is: function () {
                return !1
            },
            request: function () {},
            cancel: function () {},
            event: "",
            prefix: ""
        }, V = "webkit moz o ms khtml".split(" ");
    if ("undefined" != typeof b.cancelFullScreen) U.ok = !0;
    else
        for (var W = 0, X = V.length; X > W; W++)
            if (U.prefix = V[W], "undefined" != typeof b[U.prefix + "CancelFullScreen"]) {
                U.ok = !0;
                break
            } U.ok && (U.event = U.prefix + "fullscreenchange", U.is = function () {
        switch (this.prefix) {
        case "":
            return b.fullScreen;
        case "webkit":
            return b.webkitIsFullScreen;
        default:
            return b[this.prefix + "FullScreen"]
        }
    }, U.request = function (a) {
        return "" === this.prefix ? a.requestFullScreen() : a[this.prefix + "RequestFullScreen"]()
    }, U.cancel = function () {
        return "" === this.prefix ? b.cancelFullScreen() : b[this.prefix + "CancelFullScreen"]()
    });
    var Y, Z, $, _, ab, bb, cb, db, eb = "fotorama",
        fb = "fullscreen",
        gb = eb + "__wrap",
        hb = gb + "--css3",
        ib = gb + "--video",
        jb = gb + "--fade",
        kb = gb + "--slide",
        lb = gb + "--no-controls",
        mb = eb + "__stage",
        nb = mb + "__frame",
        ob = nb + "--video",
        pb = mb + "__shaft",
        qb = mb + "--only-active",
        rb = eb + "__grab",
        sb = eb + "__pointer",
        tb = eb + "__arr",
        ub = tb + "--disabled",
        vb = tb + "--prev",
        wb = tb + "--next",
        xb = tb + "__arr",
        yb = eb + "__nav",
        zb = yb + "-wrap",
        Ab = yb + "__shaft",
        Bb = yb + "--dots",
        Cb = yb + "--thumbs",
        Db = yb + "__frame",
        Eb = Db + "--dot",
        Fb = Db + "--thumb",
        Gb = eb + "__fade",
        Hb = Gb + "-front",
        Ib = Gb + "-rear",
        Jb = eb + "__shadow",
        Kb = Jb + "s",
        Lb = Kb + "--left",
        Mb = Kb + "--right",
        Nb = eb + "__active",
        Ob = eb + "__select",
        Pb = eb + "--hidden",
        Qb = eb + "--fullscreen",
        Rb = eb + "__fullscreen-icon",
        Sb = eb + "__error",
        Tb = eb + "__loading",
        Ub = eb + "__loaded",
        Vb = Ub + "--full",
        Wb = Ub + "--img",
        Xb = eb + "__grabbing",
        Yb = eb + "__img",
        Zb = Yb + "--full",
        $b = eb + "__dot",
        _b = eb + "__thumb",
        ac = _b + "-border",
        bc = eb + "__html",
        cc = eb + "__video",
        dc = cc + "-play",
        ec = cc + "-close",
        fc = eb + "__caption",
        gc = eb + "__oooo",
        hc = c(a),
        ic = c(b),
        jc = "CSS1Compat" === b.compatMode,
        kc = "quirks" === location.hash.replace("#", ""),
        lc = T.csstransforms3d && !kc,
        mc = U.ok,
        nc = 250,
        oc = 300,
        pc = 5e3,
        qc = 2,
        rc = 65,
        sc = 500,
        tc = 333,
        uc = "$stageFrame",
        vc = "$navDotFrame",
        wc = "$navThumbFrame",
        xc = e([.1, 0, .25, 1]),
        yc = c(J("", J(gc))),
        zc = function () {
            yc.attr("class", gc + " " + gc + "--" + db), db++, db > 4 && (db = 0)
        };
    jQuery.Fotorama = function (e, f) {
        function h() {
            c.each(Rc, function (a, b) {
                if (!b.i) {
                    b.i = yd++;
                    var c = w(b.video, !0);
                    if (c) {
                        var d = {};
                        b.video = c, b.img || b.thumb ? b.thumbsReady = !0 : d = x(b, Rc, td), y(Rc, {
                            img: d.img,
                            thumb: d.thumb
                        }, b.i, td)
                    }
                }
            })
        }

        function i(a) {
            a !== i.f && (a ? (e.html("").addClass(wd).append(Cd).before(Ad).before(Bd), c.Fotorama.size++) : (Cd.detach(), Ad.detach(), Bd.detach(), e.html(zd.urtext).removeClass(wd), c.Fotorama.size--), i.f = a)
        }

        function q() {
            Rc = td.data = Rc || z(e), Sc = td.size = Rc.length, !Qc.ok && f.shuffle && K(Rc), h(), Wd = N(Wd), Sc && i(!0)
        }

        function r() {
            Zd.noMove = 2 > Sc || Uc || gd, Zd.noSwipe = !f.swipe || Uc, Ed.toggleClass(rb, !Zd.noMove && !Zd.noSwipe)
        }

        function t(a) {
            a === !0 && (a = ""), f.autoplay = Math.max(+a || pc, 1.5 * jd)
        }

        function u(a) {
            return a ? "add" : "remove"
        }

        function v() {
            gd = "crossfade" === f.transition || "dissolve" === f.transition, bd = f.loop && (Sc > 2 || gd), jd = +f.transitionDuration || oc;
            var a = {
                add: [],
                remove: []
            };
            Sc > 1 ? (cd = f.nav, dd = "top" === f.navPosition, a.remove.push(Ob), Id.toggle(f.arrows), Xb()) : (cd = !1, Id.hide()), f.autoplay && t(f.autoplay), hd = l(f.thumbWidth) || rc, id = l(f.thumbHeight) || rc, r(), Cc(f, !0), "thumbs" === cd ? (bb(Sc, "navThumb"), Tc = Nd, sd = wc, F(Ad, c.Fotorama.jst.style({
                w: hd,
                h: id,
                m: qc,
                s: vd,
                q: !jc
            })), Kd.addClass(Cb).removeClass(Bb)) : "dots" === cd ? (bb(Sc, "navDot"), Tc = Md, sd = vc, Kd.addClass(Bb).removeClass(Cb)) : (cd = !1, Kd.removeClass(Cb + " " + Bb)), cd && (dd ? Jd.insertBefore(Dd) : Jd.insertAfter(Dd), Hb.nav = !1, Hb(Tc, Ld, "nav")), ed = f.allowFullScreen, e.insertAfter(Bd).removeClass(Pb), ed ? (Rd.appendTo(Dd), fd = mc && "native" === ed) : (Rd.detach(), fd = !1), a[u(gd)].push(jb), a[u(!gd)].push(kb), R(), Cd.addClass(a.add.join(" ")).removeClass(a.remove.join(" ")), Xd = c.extend({}, f)
        }

        function A(a) {
            return 0 > a ? (Sc + a % Sc) % Sc : a >= Sc ? a % Sc : a
        }

        function N(a) {
            return g(a, 0, Sc - 1)
        }

        function O(a) {
            return bd ? A(a) : N(a)
        }

        function S(a) {
            return a > 0 || bd ? a - 1 : !1
        }

        function T(a) {
            return Sc - 1 > a || bd ? a + 1 : !1
        }

        function V() {
            Od.minPos = bd ? -1 / 0 : -o(Sc - 1, Yd.w, qc, Xc), Od.maxPos = bd ? 1 / 0 : -o(0, Yd.w, qc, Xc), Od.snap = Yd.w + qc
        }

        function W() {
            Pd.minPos = Math.min(0, Yd.w - Ld.width()), Pd.maxPos = 0, $d.noMove = Pd.minPos === Pd.maxPos, Ld.toggleClass(rb, !$d.noMove)
        }

        function X(a, b, d) {
            if ("number" == typeof a) {
                a = new Array(a);
                var e = !0
            }
            return c.each(a, function (a, c) {
                if (e && (c = a), "number" == typeof c) {
                    var f = Rc[A(c)],
                        g = "$" + b + "Frame",
                        h = f[g];
                    d.call(this, a, c, f, h, g, h && h.data())
                }
            })
        }

        function $(a, b, c, d) {
            (!kd || "*" === kd && d === ad) && (a = n(f.width) || n(a) || sc, b = n(f.height) || n(b) || tc, td.resize({
                width: a,
                ratio: f.ratio || c || a / b
            }, 0, d === ad ? !0 : "*"))
        }

        function _(a, b, d, e, g) {
            X(a, b, function (a, h, i, j, k, l) {
                function m(a) {
                    var b = A(h);
                    Dc(a, {
                        index: b,
                        src: v,
                        frame: Rc[b]
                    })
                }

                function n() {
                    s.remove(), c.Fotorama.cache[v] = "error", i.html && "stage" === b || !w || w === v ? (v && !i.html ? (j.trigger("f:error").removeClass(Tb).addClass(Sb), m("error")) : "stage" === b && (j.trigger("f:load").removeClass(Tb + " " + Sb).addClass(Ub), m("load"), $()), l.state = "error", !(Sc > 1) || i.html || i.deleted || i.video || q || (i.deleted = !0, td.splice(h, 1))) : (i[u] = v = w, _([h], b, d, e, !0))
                }

                function o() {
                    var a = r.width,
                        g = r.height,
                        k = a / g;
                    t.measures = {
                        width: a,
                        height: g,
                        ratio: k
                    }, $(a, g, k, h), s.off("load error").addClass(Yb + (q ? " " + Zb : "")).prependTo(j), E(s, d || Yd, e || i.fit || f.fit), c.Fotorama.cache[v] = "loaded", l.state = "loaded", setTimeout(function () {
                        j.trigger("f:load").removeClass(Tb + " " + Sb).addClass(Ub + " " + (q ? Vb : Wb)), "stage" === b && m("load")
                    }, 5)
                }

                function p() {
                    C(function () {
                        return !rd
                    }, function () {
                        o()
                    })
                }
                if (j) {
                    var q = td.fullScreen && i.full && !l.$full && "stage" === b;
                    if (!l.$img || g || q) {
                        var r = new Image,
                            s = c(r),
                            t = s.data();
                        l[q ? "$full" : "$img"] = s;
                        var u = "stage" === b ? q ? "full" : "img" : "thumb",
                            v = i[u],
                            w = q ? null : i["stage" === b ? "thumb" : "img"];
                        if ("navThumb" === b && (j = l.$wrap), !v) return n(), void 0;
                        c.Fotorama.cache[v] ? function x() {
                            "error" === c.Fotorama.cache[v] ? n() : "loaded" === c.Fotorama.cache[v] ? setTimeout(p, 0) : setTimeout(x, 100)
                        }() : (c.Fotorama.cache[v] = "*", s.on("load", p).on("error", n)), r.src = v
                    }
                }
            })
        }

        function ab() {
            var a = td.activeFrame[uc];
            a && !a.data().state && (Q(a), a.on("f:load f:error", function () {
                a.off("f:load f:error"), R()
            }))
        }

        function bb(a, b) {
            X(a, b, function (a, d, e, g, h, i) {
                g || (g = e[h] = Cd[h].clone(), i = g.data(), i.data = e, "stage" === b ? (e.html && c('<div class="' + bc + '"></div>').append(c(e.html).removeAttr("id").html(e._html)).appendTo(g), f.captions && e.caption && c('<div class="' + fc + '"></div>').append(e.caption).appendTo(g), e.video && g.addClass(ob).append(Td.clone()), Fd = Fd.add(g)) : "navDot" === b ? Md = Md.add(g) : "navThumb" === b && (i.$wrap = g.children(":first"), Nd = Nd.add(g), e.video && g.append(Td.clone())))
            })
        }

        function cb(a, b, c) {
            return a && a.length && E(a, b, c)
        }

        function db(a) {
            X(a, "stage", function (a, b, d, e, g, h) {
                if (e) {
                    ae[uc].push(e.css(c.extend({
                        left: gd ? 0 : o(b, Yd.w, qc, Xc)
                    }, gd && k(0)))), B(e[0]) && (e.appendTo(Ed), Kc(d.$video));
                    var i = d.fit || f.fit;
                    cb(h.$img, Yd, i), cb(h.$full, Yd, i)
                }
            })
        }

        function Gb(a, b) {
            if ("thumbs" === cd && !isNaN(a)) {
                var d = -a,
                    e = -a + Yd.w;
                Nd.each(function () {
                    var a = c(this),
                        f = a.data(),
                        g = f.eq,
                        h = {
                            h: id
                        }, i = "cover";
                    h.w = f.w, f.l + f.w < d || f.l > e || cb(f.$img, h, i) || b && _([g], "navThumb", h, i)
                })
            }
        }

        function Hb(a, b, d) {
            if (!Hb[d]) {
                var e = "nav" === d && "thumbs" === cd,
                    f = 0;
                b.append(a.filter(function () {
                    for (var a, b = c(this), d = b.data(), e = 0, f = Rc.length; f > e; e++)
                        if (d.data === Rc[e]) {
                            a = !0, d.eq = e;
                            break
                        }
                    return a || b.remove() && !1
                }).sort(function (a, b) {
                    return c(a).data().eq - c(b).data().eq
                }).each(function () {
                    if (e) {
                        var a = c(this),
                            b = a.data(),
                            d = Math.round(id * b.data.thumbRatio || hd);
                        b.l = f, b.w = d, a.css({
                            width: d
                        }), f += d + qc
                    }
                })), Hb[d] = !0
            }
        }

        function Ib(a) {
            return a - be > Yd.w / 3
        }

        function Jb(a) {
            return !(bd || Wd + a && Wd - Sc + a || Uc)
        }

        function Xb() {
            Id.each(function (a) {
                c(this).toggleClass(ub, Jb(a))
            })
        }

        function cc(a) {
            return a.l + a.w / 2
        }

        function gc(a) {
            var b = td.activeFrame[sd].data();
            L(Qd, {
                time: .9 * a,
                pos: b.l,
                width: b.w - 2 * qc
            })
        }

        function kc(a) {
            if (Rc[a.guessIndex][sd]) {
                var b = g(a.coo - cc(Rc[a.guessIndex][sd].data()), Pd.minPos, Pd.maxPos),
                    c = .9 * a.time;
                L(Ld, {
                    time: c,
                    pos: b,
                    onEnd: function () {
                        Gb(b, !0)
                    }
                }), c && Gb(b), Jc(Kd, G(b, Pd.minPos, Pd.maxPos))
            }
        }

        function xc() {
            yc(sd), _d[sd].push(td.activeFrame[sd].addClass(Nb))
        }

        function yc(a) {
            for (var b = _d[a]; b.length;) b.shift().removeClass(Nb)
        }

        function zc(a) {
            for (var b = ae[a]; b.length;) {
                var c = b.shift();
                td.activeFrame[a] !== c && c.detach()
            }
        }

        function Bc() {
            Xc = Yc = Wd;
            var a = td.activeFrame,
                b = a[uc];
            b && (yc(uc), _d[uc].push(b.addClass(Nb)), s(Ed.css(j(0))), zc(uc), db(Wc), V(), W())
        }

        function Cc(a, b) {
            a && c.extend(Yd, {
                width: a.width || Yd.width,
                height: a.height,
                minWidth: a.minWidth,
                maxWidth: a.maxWidth,
                minHeight: a.minHeight,
                maxHeight: a.maxHeight,
                ratio: function (a) {
                    if (a) {
                        var b = Number(a);
                        return isNaN(b) ? (b = a.split("/"), Number(b[0] / b[1]) || d) : b
                    }
                }(a.ratio)
            }) && !b && c.extend(f, {
                width: Yd.width,
                height: Yd.height,
                minWidth: Yd.minWidth,
                maxWidth: Yd.maxWidth,
                minHeight: Yd.minHeight,
                maxHeight: Yd.maxHeight,
                ratio: Yd.ratio
            })
        }

        function Dc(a, b) {
            e.trigger(eb + ":" + a, [td, b])
        }

        function Ec() {
            clearTimeout(Fc.t), rd = 1, f.stopAutoplayOnTouch ? td.stopAutoplay() : od = !0
        }

        function Fc() {
            Fc.t = setTimeout(function () {
                rd = 0
            }, oc + nc)
        }

        function Gc() {
            od = !(!Uc && !pd)
        }

        function Hc() {
            if (clearTimeout(Hc.t), !f.autoplay || od) return td.autoplay && (td.autoplay = !1, Dc("stopautoplay")), void 0;
            td.autoplay || (td.autoplay = !0, Dc("startautoplay"));
            var a = Wd;
            Hc.t = setTimeout(function () {
                var b = td.activeFrame[uc].data();
                C(function () {
                    return b.state || a !== Wd
                }, function () {
                    od || a !== Wd || td.show(bd ? ">" : A(Wd + 1))
                })
            }, f.autoplay)
        }

        function Ic() {
            td.fullScreen && (td.fullScreen = !1, mc && U.cancel(xd), Z.removeClass(fb), e.removeClass(Qb).insertAfter(Bd), Dc("fullscreenexit"), Yd = c.extend({}, qd), Kc(Uc, !0, !0), td.resize(), _(Wc, "stage"), hc.scrollLeft(md).scrollTop(ld))
        }

        function Jc(a, b) {
            a.removeClass(Lb + " " + Mb), b && !Uc && a.addClass(b.replace(/^|\s/g, " " + Kb + "--"))
        }

        function Kc(a, b, c) {
            b && (Cd.removeClass(ib), Uc = !1, r()), a && a !== Uc && (a.remove(), Dc("unloadvideo")), c && (Gc(), Hc())
        }

        function Lc(a) {
            Cd.toggleClass(lb, a)
        }

        function Mc(a) {
            if (!Zd.flow) {
                var b = a ? a.pageX : Mc.x,
                    c = !Jb(Ib(b)) && f.click;
                Mc.p === c || !gd && f.swipe || !Dd.toggleClass(sb, c) || (Mc.p = c, Mc.x = b)
            }
        }

        function Nc(a, b) {
            var d = a.target,
                e = c(d);
            e.hasClass(dc) ? td.playVideo() : d === Sd ? td[(td.fullScreen ? "cancel" : "request") + "FullScreen"]() : Uc ? d === Vd && Kc(Uc, !0, !0) : b && f.arrows ? Lc() : f.click && td.show({
                index: a.shiftKey || !Ib(a._x) ? "<" : ">",
                slow: a.altKey,
                direct: !0
            })
        }

        function Oc(a, b) {
            var d = c(this).data().eq;
            td.show({
                index: d,
                slow: a.altKey,
                direct: !0,
                coo: a._x - Kd.offset().left,
                time: b
            })
        }

        function Pc() {
            q(), v(), Qc.ok || (f.hash && location.hash && (ad = H(location.hash.replace(/^#/, ""), Rc, 0 === ud)), Wd = Xc = Yc = Zc = ad = O(ad) || 0), Sc ? (Uc && Kc(Uc, !0), td.show({
                index: Wd,
                time: 0
            }), td.resize()) : td.destroy()
        }

        function Qc() {
            Qc.ok || (Qc.ok = !0, Dc("ready"))
        }
        Y = Y || c("html"), Z = Z || c("body");
        var Rc, Sc, Tc, Uc, Vc, Wc, Xc, Yc, Zc, $c, _c, ad, bd, cd, dd, ed, fd, gd, hd, id, jd, kd, ld, md, nd, od, pd, qd, rd, sd, td = this,
            ud = Ac,
            vd = +new Date,
            wd = eb + vd,
            xd = e[0],
            yd = 1,
            zd = e.data(),
            Ad = c("<style></style>"),
            Bd = c(J(Pb)),
            Cd = c(J(gb)),
            Dd = c(J(mb)).appendTo(Cd),
            Ed = (Dd[0], c(J(pb)).appendTo(Dd)),
            Fd = c(),
            Gd = c(J(tb + " " + vb, J(xb))),
            Hd = c(J(tb + " " + wb, J(xb))),
            Id = Gd.add(Hd).appendTo(Dd),
            Jd = c(J(zb)),
            Kd = c(J(yb)).appendTo(Jd),
            Ld = c(J(Ab)).appendTo(Kd),
            Md = c(),
            Nd = c(),
            Od = Ed.data(),
            Pd = Ld.data(),
            Qd = c(J(ac)).appendTo(Ld),
            Rd = c(J(Rb)),
            Sd = Rd[0],
            Td = c(J(dc)),
            Ud = c(J(ec)).appendTo(Dd),
            Vd = Ud[0],
            Wd = !1,
            Xd = {}, Yd = {}, Zd = {}, $d = {}, _d = {}, ae = {}, be = 0;
        Cd[uc] = c(J(nb)), Cd[wc] = c(J(Db + " " + Fb, J(_b))), Cd[vc] = c(J(Db + " " + Eb, J($b))), _d[uc] = [], _d[wc] = [], _d[vc] = [], ae[uc] = [], lc && Cd.addClass(lb),lc && Cd.addClass(hb), zd.fotorama = this, td.options = f, Ac++, td.startAutoplay = function (a) {
            return td.autoplay ? this : (od = pd = !1, t(a || f.autoplay), Hc(), this)
        }, td.stopAutoplay = function () {
            return td.autoplay && (od = pd = !0, Hc()), this
        }, td.show = function (a) {
            function b() {
                ab(), _(Wc, "stage"), Bc(), Dc("showend", a.direct), Mc(), Gc(), Hc()
            }
            var c, d, e = jd;
            if ("object" != typeof a ? (c = a, a = {}) : (c = a.index, e = "number" == typeof a.time ? a.time : e, d = a.overPos), a.slow && (e *= 10), c = ">" === c ? Yc + 1 : "<" === c ? Yc - 1 : "<<" === c ? 0 : ">>" === c ? Sc - 1 : c, c = isNaN(c) ? H(c, Rc, !0) : c, c = "undefined" == typeof c ? Wd || 0 : c, td.activeIndex = Wd = O(c), $c = S(Wd), _c = T(Wd), Wc = [Wd, $c, _c], Yc = bd ? c : Wd, td.activeFrame = Vc = Rc[Wd], Kc(!1, Vc.i !== Rc[A(Xc)].i), bb([Wd, $c, _c], "stage"), db([Yc]), Dc("show", a.direct), gd) {
                var h = Vc[uc],
                    i = Wd !== Zc ? Rc[Zc][uc] : null;
                M(h, i, Fd, {
                    time: e,
                    method: f.transition,
                    onEnd: b
                })
            } else L(Ed, {
                pos: -o(Yc, Yd.w, qc, Xc),
                overPos: d,
                time: e,
                onEnd: b
            }); if (Xb(), cd) {
                xc();
                var j = N(Wd + g(Yc - Zc, -1, 1)),
                    k = "undefined" == typeof a.coo;
                (k || j !== Wd) && kc({
                        time: e,
                        coo: k ? Yd.w / 2 : a.coo,
                        guessIndex: k ? Wd : j
                    }), "thumbs" === cd && gc(e)
            }
            return nd = "undefined" != typeof Zc && Zc !== Wd, Zc = Wd, f.hash && nd && !td.eq && D(Vc.id || Wd + 1), this
        }, td.requestFullScreen = function () {
            return ed && !td.fullScreen && (ld = hc.scrollTop(), md = hc.scrollLeft(), hc.scrollTop(0).scrollLeft(0), qd = c.extend({}, Yd), e.addClass(Qb).appendTo(Z.addClass(fb)), Kc(Uc, !0, !0), td.fullScreen = !0, fd && U.request(xd), td.resize(), _(Wc, "stage"), Dc("fullscreenenter")), this
        }, td.cancelFullScreen = function () {
            return fd && U.is() ? U.cancel(b) : Ic(), this
        }, b.addEventListener && b.addEventListener(U.event, function () {
            U.is() || Uc || Ic()
        }), ic.on("keydown", function (a) {
            Uc && 27 === a.keyCode ? (a.preventDefault(), Kc(Uc, !0, !0)) : (td.fullScreen || f.keyboard && !ud) && (27 === a.keyCode ? (a.preventDefault(), td.cancelFullScreen()) : 39 === a.keyCode || 40 === a.keyCode && td.fullScreen ? (a.preventDefault(), td.show({
                index: ">",
                slow: a.altKey,
                direct: !0
            })) : (37 === a.keyCode || 38 === a.keyCode && td.fullScreen) && (a.preventDefault(), td.show({
                index: "<",
                slow: a.altKey,
                direct: !0
            })))
        }), ud || ic.on("keydown", "textarea, input, select", function (a) {
            td.fullScreen || a.stopPropagation()
        }), td.resize = function (b) {
            if (!Rc) return this;
            Cc(td.fullScreen ? {
                width: "100%",
                maxWidth: null,
                minWidth: null,
                height: "100%",
                maxHeight: null,
                minHeight: null
            } : b, td.fullScreen);
            var c = arguments[1] || 0,
                d = arguments[2],
                e = Yd.width,
                f = Yd.height,
                h = Yd.ratio,
                i = a.innerHeight - (cd ? Kd.height() : 0);
            return n(e) && (Cd.css({
                width: e,
                minWidth: Yd.minWidth,
                maxWidth: Yd.maxWidth
            }), e = Yd.w = Cd.width(), f = m(f) / 100 * i || l(f), f = f || h && e / h, f && (e = Math.round(e), f = Yd.h = Math.round(g(f, m(Yd.minHeight) / 100 * i || l(Yd.minHeight), m(Yd.maxHeight) / 100 * i || l(Yd.maxHeight))), Bc(), Dd.addClass(qb).stop().animate({
                width: e,
                height: f
            }, c, function () {
                Dd.removeClass(qb)
            }), cd && (Kd.stop().animate({
                width: e
            }, c).css({
                left: 0
            }), kc({
                guessIndex: Wd,
                time: c,
                coo: Yd.w / 2
            }), "thumbs" === cd && Hb.nav && gc(c)), kd = d || !0, Qc())), be = Dd.offset().left, this
        }, td.setOptions = function (a) {
            return c.extend(f, a), Pc(), this
        }, td.shuffle = function () {
            return Rc && K(Rc) && Pc(), this
        }, td.destroy = function () {
            return td.cancelFullScreen(), td.stopAutoplay(), i(!1), Rc = td.data = null, this
        }, td.playVideo = function () {
            var a = td.activeFrame,
                b = a.video,
                d = Wd;
            return "object" == typeof b && a.videoReady && (fd && td.fullScreen && td.cancelFullScreen(), C(function () {
                return !U.is() || d !== Wd
            }, function () {
                d === Wd && (a.$video = a.$video || c(c.Fotorama.jst.video(b)), a.$video.appendTo(a[uc]), Cd.addClass(ib), Uc = a.$video, r(), Dc("loadvideo"))
            })), this
        }, td.stopVideo = function () {
            return Kc(Uc, !0, !0), this
        }, Cd.hover(function () {
            Lc(!1)
        }, function () {
            Lc(!0)
        }), Dd.on("mousemove", Mc), Zd = P(Ed, {
            onStart: Ec,
            onMove: function (a, b) {
                Jc(Dd, b.edge)
            },
            onEnd: function (a) {
                if (Jc(Dd), Fc(), a.moved || a.touch && a.pos !== a.newPos) {
                    var b = p(a.newPos, Yd.w, qc, Xc);
                    td.show({
                        index: b,
                        time: a.time,
                        overPos: a.overPos,
                        direct: !0
                    })
                } else a.aborted || Nc(a.startEvent, a.touch)
            },
            getPos: function () {
                return -o(Yc, Yd.w, qc, Xc)
            },
            timeLow: 1,
            timeHigh: 1,
            friction: 2,
            select: "." + Ob + ", ." + Ob + " *",
            $wrap: Dd
        }), $d = P(Ld, {
            onStart: Ec,
            onMove: function (a, b) {
                Jc(Kd, b.edge)
            },
            onEnd: function (a) {
                function b() {
                    Gc(), Hc(), Gb(a.newPos, !0)
                }
                if (Fc(), a.moved) a.pos !== a.newPos ? (L(Ld, {
                    time: a.time,
                    pos: a.newPos,
                    overPos: a.overPos,
                    onEnd: b
                }), Gb(a.newPos), Jc(Kd, G(a.newPos, Pd.minPos, Pd.maxPos))) : b();
                else {
                    var c = a.$target.closest("." + Db, Ld)[0];
                    c && Oc.call(c, a.startEvent)
                }
            },
            timeLow: .5,
            timeHigh: 2,
            friction: 5,
            $wrap: Kd
        }), I(Id, function (a) {
            a.preventDefault(), Uc ? Kc(Uc, !0, !0) : (Fc(), td.show({
                index: Id.index(this) ? ">" : "<",
                slow: a.altKey,
                direct: !0
            }))
        }, {
            onStart: function () {
                Ec(), Zd.control = !0
            },
            tail: Zd
        }), c.each("load push pop shift unshift reverse sort splice".split(" "), function (a, b) {
            td[b] = function () {
                return Rc = Rc || [], "load" !== b ? Array.prototype[b].apply(Rc, arguments) : arguments[0] && "object" == typeof arguments[0] && arguments[0].length && (Rc = arguments[0]), Pc(), td
            }
        }), hc.on("resize", td.resize), Pc()
    }, c.fn.fotorama = function (a) {
        return this.each(function () {
            var b = this,
                d = c(this),
                e = d.data(),
                f = e.fotorama;
            f ? f.setOptions(a) : C(function () {
                return !A(b)
            }, function () {
                e.urtext = d.html(), new c.Fotorama(d, c.extend({}, {
                    width: null,
                    minWidth: null,
                    maxWidth: null,
                    height: null,
                    minHeight: null,
                    maxHeight: null,
                    ratio: null,
                    nav: "dots",
                    navPosition: "bottom",
                    thumbWidth: rc,
                    thumbHeight: rc,
                    arrows: !0,
                    click: !0,
                    swipe: !0,
                    allowFullScreen: !1,
                    fit: "contain",
                    transition: "slide",
                    transitionDuration: oc,
                    captions: !0,
                    hash: !1,
                    autoplay: !1,
                    stopAutoplayOnTouch: !0,
                    keyboard: !1,
                    loop: !1,
                    shuffle: !1
                }, a, e))
            })
        })
    }, c.Fotorama.cache = {};
    var Ac = 0;
    c.Fotorama.size = 0, c(function () {
        c("." + eb + ':not([data-auto="false"])').fotorama()
    }), c = c || {}, c.Fotorama = c.Fotorama || {}, c.Fotorama.jst = c.Fotorama.jst || {}, c.Fotorama.jst.style = function (a) {
        var b, c = "";
        return S.escape, c += ".fotorama" + (null == (b = a.s) ? "" : b) + " .fotorama__nav--thumbs .fotorama__nav__frame{\npadding:" + (null == (b = a.m) ? "" : b) + "px;\npadding-left:0;\nheight:" + (null == (b = a.h) ? "" : b) + "px}\n.fotorama" + (null == (b = a.s) ? "" : b) + " .fotorama__nav--thumbs .fotorama__nav__frame:last-child{\npadding-right:0}\n.fotorama" + (null == (b = a.s) ? "" : b) + " .fotorama__thumb-border{\nheight:" + (null == (b = a.h - a.m * (a.q ? 0 : 2)) ? "" : b) + "px;\nborder-width:" + (null == (b = a.m) ? "" : 3) + "px;\nmargin-top:" + (null == (b = a.m) ? "" : b) + "px}"
    }, c.Fotorama.jst.video = function (a) {
        function b() {
            c += d.call(arguments, "")
        }
        var c = "",
            d = (S.escape, Array.prototype.join);
        return c += '<div class="fotorama__video"><iframe src="', b("youtube" == a.type ? "http://youtube.com/embed/" + a.id + "?autoplay=1" : "vimeo" == a.type ? "http://player.vimeo.com/video/" + a.id + "?autoplay=1&amp;badge=0" : a.id), c += '" frameborder="0" allowfullscreen></iframe></div>'
    }
}(window, document, jQuery);
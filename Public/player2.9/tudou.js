(function(a) {
	typeof a.CMP == "undefined" && (a.CMP = function() {
		var b = /msie/.test(navigator.userAgent.toLowerCase()),
			c = function(a, b) {
				if (b && typeof b == "object") for (var c in b) a[c] = b[c];
				return a
			},
			d = function(a, d, e, f, g, h, i) {
				i = c({
					width: d,
					height: e,
					id: a
				}, i), h = c({
					allowfullscreen: "true",
					allowscriptaccess: "always"
				}, h);
				var j, k, l = [];
				if (g) {
					j = g;
					if (typeof g == "object") {
						for (var m in g) l.push(m + "=" + encodeURIComponent(g[m]));
						j = l.join("&")
					}
					h.flashvars = j
				}
				k = "<object ", k += b ? 'classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" ' : 'type="application/x-shockwave-flash" data="' + f + '" ';
				for (var m in i) k += m + '="' + i[m] + '" ';
				k += b ? '><param name="movie" value="' + f + '" />' : ">";
				for (m in h) k += '<param name="' + m + '" value="' + h[m] + '" />';
				return k += "</object>", k
			},
			e = function(c) {
				var d = document.getElementById(c);
				if (!d || d.nodeName.toLowerCase() != "object") d = b ? a[c] : document[c];
				return d
			},
			f = function(a) {
				if (a) {
					for (var b in a) typeof a[b] == "function" && (a[b] = null);
					a.parentNode.removeChild(a)
				}
			},
			g = function(a) {
				if (a) {
					var c = typeof a == "string" ? e(a) : a;
					if (c && c.nodeName.toLowerCase() == "object") return b ? (c.style.display = "none", function() {
						c.readyState == 4 ? f(c) : setTimeout(arguments.callee, 15)
					}()) : c.parentNode.removeChild(c), !0
				}
				return !1
			};
		return {
			create: function() {
				return d.apply(this, arguments)
			},
			write: function() {
				var a = d.apply(this, arguments);
				return document.write(a), a
			},
			get: function(a) {
				return e(a)
			},
			remove: function(a) {
				return g(a)
			}
		}
	}());
	var b = function(b) {
			b = b || a.event;
			var c = b.target || b.srcElement;
			if (c && typeof c.cmp_version == "function") {
				var d = c.skin("list.tree", "maxVerticalScrollPosition");
				if (d > 0) return c.focus(), b.preventDefault && b.preventDefault(), !1
			}
		};
	a.addEventListener && a.addEventListener("DOMMouseScroll", b, !1), a.onmousewheel = document.onmousewheel = b
})(window);
var cMenu = "懒人听书";
var cLink = "http://www.lrts.net/";
var cmpo;

function cmp_loaded(key) {
	cmpo = CMP.get("cmp");
	if (cmpo) {
		cmpo.addEventListener("model_state", "cmp_model_state");
		cmpo.addEventListener("control_next", "cmp_model_next");
		cmpo.addEventListener("control_prev", "cmp_model_up")
	}
};

function cmp_model_next() {
	window.location = Player.NextWebPage
};

function cmp_model_up() {
	window.location = Player.LastWebPage
};

function cmp_model_state(state) {
	if (state == "completed") {
		if (Player.NextWebPage) {
			window.location = Player.NextWebPage
		}
	}
};
function $Showhtml() {
	var flashvars = {
		name: cMenu,
		link: cLink,
		link_target: "_blank",
		skin_id: "6",
		src: "http://vr.tudou.com/v2proxy/v2?it=" + Player.Url,
		label: Player.UrlName,
		plugins: "/Public/player2.9/cmp/tudou.swf",
		skin: "/Public/player2.9/cmp/mytt01.zip",
		auto_play: "1",
		api: "cmp_loaded"
	};
	var CMPembed = CMP.create("cmp", Player.Width, (Player.Height - 6), "/Public/player2.9/cmp/cmp.swf", flashvars);
	return CMPembed
}
Player.Show();
if (Player.Second) {
	$$('buffer').style.height = Player.Height - 35;
	$$("buffer").style.display = "block";
	setTimeout("Player.BufferHide();", Player.Second * 1000)
}
/*
 * 琛ㄥ崟楠岃瘉鎻掍欢 easyform
 * Author:LeeLanfei
 * 2014-11-5
 * 鐢ㄤ簬琛ㄥ崟楠岃瘉
 * 鍙鍦ㄩ渶瑕侀獙璇佺殑鎺т欢涓婃坊鍔爀asyform灞炴€у嵆鍙紝澶氫釜灞炴€х敤[;]杩炴帴
 * 灞炴€у垪琛細
 *      null
 *      email
 *      char-normal         鑻辨枃銆佹暟瀛椼€佷笅鍒掔嚎
 *      char-chinese        涓枃銆佽嫳鏂囥€佹暟瀛椼€佷笅鍒掔嚎銆佷腑鏂囨爣鐐圭鍙�
 *      char-english        鑻辨枃銆佹暟瀛椼€佷笅鍒掔嚎銆佽嫳鏂囨爣鐐圭鍙�
 *      length:1-10 / length:4
 *      equal:xxx                               绛変簬鏌愪釜瀵硅薄鐨勫€硷紝鍐掑彿鍚庢槸jq閫夋嫨鍣ㄨ娉�
 *      ajax:fun()
 *      real-time                               瀹炴椂妫€鏌�
 *      date                    2014-10-31
 *      time                    10:30:00
 *      datetime            2014-10-31 10:30:00
 *      money               姝ｆ暟锛屼袱浣嶅皬鏁�
 *      uint :1                 姝ｆ暣鏁� , 鍙傛暟涓鸿捣濮嬪€�
 *
 *
 *  ------ requirement list ----------------------------------------------------
 * 1. 2014-11-18 娌℃湁鎺掗櫎闅愯棌璧锋潵鐨刬nput鍜宧idden绫诲瀷鐨刬nput
 * 2. 2014-11-18 闇€瑕佹敮鎸佹湁鏉′欢鐨勬彁绀轰俊鎭€�
 * 3. 2014-11-19 ajax涓嶆敮鎸佸紓姝�
 * 4. 2014-11-19 娌℃湁鑰冭檻file绫诲瀷绛夌壒娈婄被鍨嬬殑鍒ゆ柇
 * 5. 2014-11-20 褰撶綉椤佃浇鍏ユ椂鏈夐殣钘忕殑鎺т欢锛屼箣鍚庢帶浠舵樉绀哄嚭鏉ュ悗锛屽叾鍏宠仈鐨別asytip涓嶈兘姝ｇ‘鏄剧ず浣嶇疆
 * 6. 2014-11-21 鐩墠涓嶆敮鎸佸睘鎬х户鎵�
 * 7. 2014-11-21 瀹炴椂妫€鏌ョ殑鏃跺€欙紝寮瑰嚭鐨別asytip鏈夋椂鍊欎細瀵艰嚧寮瑰嚭淇℃伅鐨勬秷鎭嚭閿�
 *
 *
 * ------ change list -------------------------------------------------
 * 1. 2014-11-18 requirement list 1 瀹屾垚
 * 2. 2014-11-18 鏀寔瀹炴椂妫€鏌�
 * 3. 2014-11-18 requirement list 2 瀹屾垚
 * 4. 2014-11-20 requirement list 3鏀寔浜哸jax寮傛楠岃瘉鏂瑰紡銆�
 * 5. 2014-11-21 requirement list 5瀹屾垚
 *
 * */
;
(function ($, window, document, undefined)
{
    /*
     鏋勯€犲嚱鏁�
     **/
    var _easyform = function (ele, opt)
    {
        this.form = ele;

        this.defaults = {
            easytip: true
        };
        this.options = $.extend({}, this.defaults, opt);

        this.result = [];
        this.inputs = [];

        this.counter = 0;   //宸茬粡鍒ゆ柇鎴愬姛鐨刬nput璁℃暟
        this.is_submit = true;

        //浜嬩欢瀹氫箟
        this.success = null;
        this.error = null;
    };

    //鏂规硶
    _easyform.prototype = {

        init: function ()
        {
            var ei = this;
            ei._load();

            //鏀瑰啓 submit 鐨勫睘鎬э紝渚夸簬鎺у埗
            this.submit_button = this.form.find("input:submit");
            this.submit_button.each(function ()
            {
                var button = $(this);
                button.attr("type", "button");

                //鎻愪氦鍓嶅垽鏂�
                button.click(function ()
                {
                    ei.submit(true);
                });
            });

            return this;
        },

        _load: function ()
        {
            this.inputs.splice(0, this.inputs.length);
            var ev = this;

            this.form.find("input:visible").each(function (index, input)
            {
                //鎺掗櫎 hidden銆乥utton銆乻ubmit銆乧heckbox銆乺adio銆乫ile
                if (input.type != "hidden" && input.type != "button" && input.type != "submit" && input.type != "checkbox" && input.type != "radio" && input.type != "file")
                {
                    var checker = $(input).easyinput({easytip: ev.easytip});

                    checker.error = function (e)
                    {
                        ev.is_submit = false;
                        ev.result.push(e);

                        if (!!ev.error)    //澶辫触浜嬩欢
                            ev.error(e);
                    };

                    checker.success = function (e)
                    {
                        ev.counter++;
                        if (ev.counter == ev.inputs.length)
                        {
                            ev.counter = 0;

                            if (!!ev.success)    //鎴愬姛浜嬩欢
                                ev.success();

                            if (!!ev.is_submit)
                            {
                                ev.form.submit();
                            }
                        }
                    };

                    ev.inputs.push(checker);
                }
            });
        },

        /*
         * 琛ㄥ崟鎻愪氦鍑芥暟
         * @submit锛歜ool鍊硷紝鐢ㄤ簬瀹氫箟鏄惁鐪熺殑鎻愪氦琛ㄥ崟
         * */
        submit: function (submit)
        {
            this._load();                                               //閲嶆柊杞藉叆鎺т欢
            this.result.splice(0, this.result.length);     //娓呯┖鍓嶄竴娆＄殑缁撴灉

            this.counter = 0;
            this.is_submit = submit;

            var index;
            for (index in this.inputs)
            {
                this.inputs[index].validation();
            }
        }

    };

    //娣诲姞鍒癹query
    $.fn.easyform = function (options)
    {
        var validation = new _easyform(this, options);

        return validation.init();
    };


})(jQuery, window, document);

(function ($, window, document, undefined)
{
    //鍗曚釜input鐨勬鏌ュ櫒鏋勯€犲嚱鏁�
    var _easyinput = function (input, opt)
    {
        this.input = input;
        this.rules = [];

        this.message = $(input).attr("message");
        this.message = (!!this.message ? this.message : "鏍煎紡閿欒!");

        //浜嬩欢
        this.error = null;
        this.success = null;

        this.defaults = {
            easytip: true   //鏄惁鏄剧ずeasytip
        };
        this.options = $.extend({}, this.defaults, opt);

        this.counter = 0;   //璁℃暟鍣紝璁板綍宸茬粡鏈夊灏戜釜鏉′欢鎴愬姛

        this.is_error = false;
    };

    //鍗曚釜input鐨勬鏌ュ櫒
    _easyinput.prototype = {

        init: function ()
        {
            //鍒濆鍖杄asytip
            this._init_easytip();

            //鏄惁瀹炴椂妫€鏌�
            var easyinput = this;
            var rule = this.input.attr("easyform");
            if (!!rule && -1 != rule.indexOf("real-time"))
            {
                this.input.blur(function ()
                {
                    easyinput.validation();
                });
            }

            return this;
        },

        //鍒濆鍖杄asytip
        _init_easytip: function ()
        {
            if (!!this.options.easytip)
            {
                var tipoptions = $(this.input).attr("easytip");

                tipoptions = (!!tipoptions ? tipoptions.split(";") : undefined);

                if (!!tipoptions)
                {
                    var options = Object();
                    var index;
                    for (index in tipoptions)
                    {
                        var temps = tipoptions[index];
                        var p = temps.indexOf(":");

                        if (-1 == p)continue;

                        var temp = [];
                        temp[0] = temps.substring(0, p);
                        temp[1] = temps.substring(p + 1);

                        options[temp[0]] = temp[1];
                    }
                }

                this.options.easytip = $(this.input).easytip(options);
            }
        },

        /**
         * 瑙勫垯鍒ゆ柇
         * */
        validation: function ()
        {
            this.value = this.input.val();
            this.counter = 0;   //璁℃暟鍣ㄦ竻闆�
            this.rule = this.input.attr("easyform");

            this.is_error = false;

            this._parse(this.rule);

            this._null(this, this.value, this.rule);

            for (var i = 0; i < this.rules.length; i++)
            {
                //璋冪敤鏉′欢鍑芥暟
                if (!!this.judge[this.rules[i].rule])
                    this.judge[this.rules[i].rule](this, this.value, this.rules[i].param);
            }
        },

        //easyform 瑙ｆ瀽鍑芥暟
        _parse: function (str)
        {
            this.rules = [];

            var strs = !!str ? str.split(";") : {};

            for (var i = 0; i < strs.length; i++)
            {
                var s = strs[i];
                var rule = s;
                var param = "";

                //鏈夛細鍙�
                var p = s.indexOf(":");
                if (-1 != p)
                {
                    rule = s.substr(0, p);
                    param = s.substr(p + 1);
                }

                if (!!this.judge[rule])
                    this.rules.push({rule: rule, param: param});
            }
        },

        _error: function (rule)
        {
            if (!!this.error)
                this.error(this.input, rule);

            if (false == this.is_error)
            {
                var msg = this.input.attr(rule + "-message");

                var msg = !msg ? this.message : msg;

                if (!!this.options.easytip)
                {
                    this.options.easytip.show(msg);
                }

                this.is_error = true;
            }

            return false;
        },

        _success: function ()
        {
            if (!!this.success)
                this.success(this.input);

            return true;
        },

        _success_rule: function (rule)
        {
            this.counter += 1;

            if (this.counter == this.rules.length)
                this._success();

            return true;
        },

        _null: function (ei, v, r)
        {
            if (!v)
            {
                if (!!r && -1 != r.indexOf("null")) //rule涓嶄负绌哄苟涓斿惈鏈塶ull
                {
                    return ei._success();
                }
                else
                {
                    return ei._error("require");
                }
            }
        },

        /*
         * 鎸夌収鍚勭rule杩涜鍒ゆ柇鐨勫嚱鏁版暟缁�
         * 閫氳繃瀵筳udge娣诲姞鎴愬憳鍑芥暟锛屽彲浠ユ墿鍏呰鍒�
         * */
        judge: {
            "char-normal": function (ei, v, p)
            {
                if (false == /^\w+$/.test(v))
                    return ei._error("char-normal");
                else
                    return ei._success_rule("char-normal");
            },

            "char-chinese": function (ei, v, p)
            {
                if (false == /^([\w]|[\u4e00-\u9fa5]|[ 銆傦紝銆侊紵锟モ€溾€橈紒锛氥€愩€戙€娿€嬶紙锛夆€斺€�+-])+$/.test(v))
                    return ei._error("char-chinese");
                else
                    return ei._success_rule("char-chinese");
            },

            "char-english": function (ei, v, p)
            {
                if (false == /^([\w]|[ .,?!$'":+-])+$/.test(v))
                    return ei._error("char-english");
                else
                    return ei._success_rule("char-english");
            },

            "email": function (ei, v, p)
            {
                if (false == /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/.test(v))
                    return ei._error("email");
                else
                    return ei._success_rule("email");
            },

            "length": function (ei, v, p)
            {
                var range = p.split("-");

                //濡傛灉闀垮害璁剧疆涓� length:6 杩欐牱鐨勬牸寮�
                if (range.length == 1) range[1] = range[0];

                if (v.length < range[0] || v.length > range[1])
                    return ei._error("length");
                else
                    return ei._success_rule("length");
            },

            "equal": function (ei, v, p)
            {
                var pair = $(p);
                if (0 == pair.length || pair.val() != v)
                    return ei._error("equal");
                else
                    return ei._success_rule("equal");
            },

            "ajax": function (ei, v, p)
            {
                // 涓篴jax澶勭悊娉ㄥ唽鑷畾涔変簨浠�
                // HTML涓墽琛岀浉鍏崇殑AJAX鏃讹紝闇€瑕佸彂閫佷簨浠� easyinput-ajax 鏉ラ€氱煡 easyinput
                // 璇ヤ簨浠跺彧鏈変竴涓猙ool鍙傛暟锛宔asyinput 浼氭牴鎹繖涓€煎垽鏂璦jax楠岃瘉鏄惁鎴愬姛
                ei.input.delegate("", "easyinput-ajax", function (e, p)
                {
                    ei.input.unbind("easyinput-ajax");

                    if (false == p)
                        return ei._error("ajax");
                    else
                        return ei._success_rule("ajax");
                });

                eval(p);
            },

            "date": function (ei, v, p)
            {
                if (false == /^(\d{4})-(\d{2})-(\d{2})$/.test(v))
                    return ei._error("date");
                else
                    return ei._success_rule("date");
            },

            "time": function (ei, v, p)
            {
                if (false == /^(\d{2}):(\d{2}):(\d{2})$/.test(v))
                    return ei._error("time");
                else
                    return ei._success_rule(v);
            },

            "datetime": function (ei, v, p)
            {
                if (false == /^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/.test(v))
                    return ei._error("datetime");
                else
                    return ei._success_rule("datetime");
            },

            "money": function (ei, v, p)
            {
                if (false == /^([1-9][\d]{0,7}|0)(\.[\d]{1,2})?$/.test(v))
                    return ei._error("money");
                else
                    return ei._success_rule("money");
            },

            "uint": function (ei, v, p)
            {
                v = parseInt(v);
                p = parseInt(p);

                if (isNaN(v) || isNaN(p) || v < p || v < 0)
                    return ei._error("uint");
                else
                    return ei._success_rule("uint");
            }
        }
    };

    $.fn.easyinput = function (options)
    {
        var check = new _easyinput(this, options);

        return check.init();
    };

})(jQuery, window, document);

(function ($, window, document, undefined)
{
    var themes = {
        black: {
            color: "rgba(238,238,238,1)",
            "background-color": "rgba(75,75,75,0.8",
            "border": "1px solid rgba(75,75,75,1)",
            "border-radius": 5
        },
        blue: {
            color: "rgba(255,255,255,1)",
            "background-color": "rgba(51,153,204,0.8)",
            "border": "1px solid rgba(102,153,204,1)",
            "border-radius": 5
        },
        red: {
            color: "rgba(255,255,255,1)",
            "background-color": "rgba(255,102,102,0.9)",
            "border": "1px solid rgba(204,0,51,1)",
            "border-radius": 5
        },
        white: {
            color: "rgba(102,102,102,1)",
            "background-color": "rgba(255,255,255,0.9)",
            "border": "1px solid rgba(153,153,153,1)",
            "border-radius": 5
        }
    };

    var _easytip = function (ele, opt)
    {
        this.parent = ele;
        this.defaults = {
            left: 0, top: 0,
            position: "right",
            disappear: "other",        //self, other, lost-focus, none, N seconds
            speed: "fast",
            theme: "white",
            arrow: "bottom",        //top, left, bottom, right
            onshow: null,
            onclose: null,
            style: {}
        };
        this.options = $.extend({}, this.defaults, opt);
        this.theme = themes[this.options.theme];

        this.padding = 0;

        this.id = "easytip-div-main" + ele[0].id;
    };

    _easytip.prototype = {

        init: function ()
        {
            var tip = $("#" + this.id);

            if (tip.length == 0)
            {
                $(document.body).append("<div id=\"" + this.id + "\"><div class=\"easytip-text\"></div></div>");

                tip = $("#" + this.id);
                var text = $("#" + this.id + " .easytip-text");

                tip.css({
                    "text-align": "left",
                    "display": "none",
                    "position": "absolute"
                });

                text.css({
                    "text-align": "left",
                    "padding": "10px",
                    "min-width": "120px"
                });

                tip.append("<div class=\"easytip-arrow\"></div>");
                var arrow = $("#" + this.id + " .easytip-arrow");
                arrow.css({
                    "padding": "0",
                    "margin": "0",
                    "width": "0",
                    "height": "0",
                    "position": "absolute",
                    "border": "10px solid"
                });
            }

            return this;
        },

        _size: function ()
        {
            var parent = this.parent;
            var tip = $("#" + this.id);


            if (tip.width() > 300)
            {
                tip.width(300);
            }
        },

        _css: function ()
        {
            var tip = $("#" + this.id);
            var text = $("#" + this.id + " .easytip-text");
            var arrow = $("#" + this.id + " .easytip-arrow");

            text.css(this.theme);

            arrow.css("border-color", "transparent transparent transparent transparent");

            if (this.options.style != null && typeof(this.options.style) == "object")
            {
                text.css(this.options.style);
            }
        },

        _arrow: function ()
        {
            var tip = $("#" + this.id);
            var text = $("#" + this.id + " .easytip-text");
            var arrow = $("#" + this.id + " .easytip-arrow");

            switch (this.options.arrow)
            {
                case "top":
                    arrow.css({
                        "left": "25px",
                        "top": -arrow.outerHeight(),
                        "border-bottom-color": text.css("borderTopColor")
                    });
                    break;

                case "left":
                    arrow.css({
                        "left": -arrow.outerWidth(),
                        "top": tip.innerHeight() / 2 - arrow.outerHeight() / 2,
                        "border-right-color": text.css("borderTopColor")
                    });
                    break;

                case "bottom":
                    arrow.css({
                        "left": "25px",
                        "top": tip.innerHeight(),
                        "border-top-color": text.css("borderTopColor")
                    });
                    break;

                case "right":
                    arrow.css({
                        "left": tip.outerWidth(),
                        "top": tip.innerHeight() / 2 - arrow.outerHeight() / 2,
                        "border-left-color": text.css("borderTopColor")
                    });
                    break;
            }
        },

        _position: function ()
        {
            var tip = $("#" + this.id);
            var text = $("#" + this.id + " .easytip-text");
            var arrow = $("#" + this.id + " .easytip-arrow");
            var offset = $(this.parent).offset();
            var size = {width: $(this.parent).outerWidth(), height: $(this.parent).outerHeight()};

            switch (this.options.position)
            {
                case "top":

                    tip.css("left", offset.left - this.padding);
                    tip.css("top", offset.top - tip.outerHeight() - arrow.outerHeight() / 2);
                    this.options.arrow = "bottom";

                    break;

                case "left":

                    tip.css("left", offset.left - tip.outerWidth() - arrow.outerWidth() / 2);
                    tip.css("top", offset.top - (tip.outerHeight() - size.height) / 2);
                    this.options.arrow = "right";

                    break;

                case "bottom":

                    tip.css("left", offset.left - this.padding);
                    tip.css("top", offset.top + size.height + arrow.outerHeight() / 2);
                    this.options.arrow = "top";

                    break;

                case "right":

                    tip.css("left", offset.left + size.width + arrow.outerWidth() / 2);
                    tip.css("top", offset.top - (tip.outerHeight() - size.height) / 2);
                    this.options.arrow = "left";

                    break;
            }

            var left = parseInt(tip.css("left"));
            var top = parseInt(tip.css("top"));

            tip.css("left", parseInt(this.options.left) + left);
            tip.css("top", parseInt(this.options.top) + top);
        },

        show: function (msg)
        {
            var tip = $("#" + this.id);
            var text = $("#" + this.id + " .easytip-text");
            var arrow = $("#" + this.id + " .easytip-arrow");
            var speed = this.options.speed;
            var disappear = this.options.disappear;
            var parent = this.parent;

            text.html(msg);

            this._size();
            this._css();
            this._position();
            this._arrow();

            var onshow = this.options.onshow;
            var onclose = this.options.onclose;

            tip.fadeIn(speed, function ()
            {
                if (!!onshow)    onshow({parent: parent, target: tip[0]});

                if (!isNaN(disappear))
                {
                    setTimeout(function ()
                    {

                        tip.fadeOut(speed, function ()
                        {
                            if (!!onclose)    onclose({parent: parent, target: tip[0]});
                        });

                    }, disappear);
                }
                else if (disappear == "self" || disappear == "other")
                {
                    $(document).click(function (e)
                    {
                        if (disappear == "self" && e.target == text[0])
                        {
                            tip.fadeOut(speed, function ()
                            {
                                if (!!onclose)    onclose({parent: parent, target: tip[0]});
                                $(document).unbind("click");
                            });
                        }
                        else if (disappear == "other" && e.target != tip[0])
                        {
                            tip.fadeOut(speed, function ()
                            {
                                if (!!onclose)    onclose({parent: parent, target: tip[0]});
                                $(document).unbind("click");
                            });
                        }
                    });
                }
                else if (disappear == "lost-focus")
                {
                    $(parent).focusout(function ()
                    {
                        tip.fadeOut(speed, function ()
                        {
                            if (!!onclose)    onclose({parent: parent, target: tip[0]});
                            $(parent).unbind("focusout");
                        });
                    });
                }
            });
        },

        close: function ()
        {
            var tip = $("#" + this.id);
            var parent = this.parent;
            var onclose = this.options.onclose;

            tip.fadeOut(this.options.speed, function ()
            {
                if (!!onclose)    onclose({parent: parent, target: tip[0]});
            });
        }
    };

    $.fn.easytip = function (options)
    {
        var tip = new _easytip(this, options);

        return tip.init();
    };

})(jQuery, window, document);
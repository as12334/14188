/**
 * Created by kimi on 15-11-19.
 */
var Config = {
    cloud:"" 
};
var __HOST_IMAGE__=Config.cloud==''?'':'',
    __TOP_DOMAIN__="",
    __HOST_AUTH__="",
    __HOST_UPLOAD__,
    __HOST_FILE__,
    __HOST_SECRET__;

function Images() {
}
Images.prototype.RESIZE_TYPE = {
    SCALING: 1, //按比例缩放
    SCALING_HEIGHT: 2, //宽度不变，高度按百分比缩放
    SCALING_WEIGHT: 3, //高度不变，宽度安百分比缩放
    ASSESS_WIDTH: 4, //指定宽度，高度等比缩放
    ASSESS_HEIGHT: 5, //指定高度，宽度等比缩放
    ASSESS_MAX: 6, //限定长边，短边自适应缩放，将目标图片限制在指定宽高矩形内
    ASSESS_MIN: 7, //限定短边，长边自适应缩放，目标图片会超出指定矩形
    ASSESS_BOTH_MIN: 8 //指定高和宽的最小尺寸,等比缩放,如只指定高或宽,则未指定边按照指定数值进行裁剪.但是超出指定矩形会被居中裁剪
};
Images.prototype.parseSrc = function (path) {
    var patt = new RegExp('((https?:)?\/\/.*?)?\/?.*?_(\\d+)x(\\d+)\.([a-z0-9]{2,6})', "g");
    var matches = patt.exec(path);
    var info = {};
    if (!this.empty(matches)) {
        info.width = parseInt(matches[3]);
        info.height = parseInt(matches[4]);
        info.suffix = matches[5];
        info.path = matches[0];
        if(!this.empty(matches[1])){
            info.path = info.path.replace('((https?:)?\/\/.*?)\/',"/")
        }
        // console.log(info.path);
        if(info.path.indexOf('http://')<0&&info.path[0]!=="/"){
            info.path = "/"+info.path;
        }
        return info;
    } else {
        return false;
    }
};
Images.prototype.thumb = function (path, width, height, quality, suffix) {
    return path;
};

Images.prototype.in_array = function (needle, haystack, argStrict) {
    var key = '',
        strict = !!argStrict;
    if (strict) {
        for (key in haystack) {
            if (haystack[key] === needle) {
                return true;
            }
        }
    } else {
        for (key in haystack) {
            if (haystack[key] == needle) {
                return true;
            }
        }
    }

    return false;
};
Images.prototype.http_build_query = function (formdata, numeric_prefix, arg_separator) {
    var value, key, tmp = [],
        that = this;
    var _http_build_query_helper = function (key, val, arg_separator) {
        var k, tmp = [];
        if (val === true) {
            val = '1';
        } else if (val === false) {
            val = '0';
        }
        if (val != null) {
            if (typeof val === 'object') {
                for (k in val) {
                    if (val[k] != null) {
                        tmp.push(_http_build_query_helper(key + '[' + k + ']', val[k], arg_separator));
                    }
                }
                return tmp.join(arg_separator);
            } else if (typeof val !== 'function') {
                return that.urlencode(key) + '=' + that.urlencode(val);
            } else {
                throw new Error('There was an error processing for http_build_query().');
            }
        } else {
            return '';
        }
    };

    if (!arg_separator) {
        arg_separator = '&';
    }
    for (key in formdata) {
        value = formdata[key];
        if (numeric_prefix && !isNaN(key)) {
            key = String(numeric_prefix) + key;
        }
        var query = _http_build_query_helper(key, value, arg_separator);
        if (query !== '') {
            tmp.push(query);
        }
    }

    return tmp.join(arg_separator);
};
Images.prototype.urlencode = function (str) {
    str = (str + '')
        .toString();
    return encodeURIComponent(str)
        .replace(/!/g, '%21')
        .replace(/'/g, '%27')
        .replace(/\(/g, '%28')
        .
        replace(/\)/g, '%29')
        .replace(/\*/g, '%2A')
        .replace(/%20/g, '+');
};
Images.prototype.min = function () {
    var ar, retVal, i = 0,
        n = 0,
        argv = arguments,
        argc = argv.length,
        _obj2Array = function (obj) {
            if (Object.prototype.toString.call(obj) === '[object Array]') {
                return obj;
            }
            var ar = [];
            for (var i in obj) {
                if (obj.hasOwnProperty(i)) {
                    ar.push(obj[i]);
                }
            }
            return ar;
        }; //function _obj2Array
    _compare = function (current, next) {
        var i = 0,
            n = 0,
            tmp = 0,
            nl = 0,
            cl = 0;

        if (current === next) {
            return 0;
        } else if (typeof current === 'object') {
            if (typeof next === 'object') {
                current = _obj2Array(current);
                next = _obj2Array(next);
                cl = current.length;
                nl = next.length;
                if (nl > cl) {
                    return 1;
                } else if (nl < cl) {
                    return -1;
                }
                for (i = 0, n = cl; i < n; ++i) {
                    tmp = _compare(current[i], next[i]);
                    if (tmp == 1) {
                        return 1;
                    } else if (tmp == -1) {
                        return -1;
                    }
                }
                return 0;
            }
            return -1;
        } else if (typeof next === 'object') {
            return 1;
        } else if (isNaN(next) && !isNaN(current)) {
            if (current == 0) {
                return 0;
            }
            return (current < 0 ? 1 : -1);
        } else if (isNaN(current) && !isNaN(next)) {
            if (next == 0) {
                return 0;
            }
            return (next > 0 ? 1 : -1);
        }

        if (next == current) {
            return 0;
        }
        return (next > current ? 1 : -1);
    }; //function _compare
    if (argc === 0) {
        throw new Error('At least one value should be passed to min()');
    } else if (argc === 1) {
        if (typeof argv[0] === 'object') {
            ar = _obj2Array(argv[0]);
        } else {
            throw new Error('Wrong parameter count for min()');
        }
        if (ar.length === 0) {
            throw new Error('Array must contain at least one element for min()');
        }
    } else {
        ar = argv;
    }

    retVal = ar[0];
    for (i = 1, n = ar.length; i < n; ++i) {
        if (_compare(retVal, ar[i]) == -1) {
            retVal = ar[i];
        }
    }

    return retVal;
};

Images.prototype.max = function () {
    var ar, retVal, i = 0,
        n = 0,
        argv = arguments,
        argc = argv.length,
        _obj2Array = function (obj) {
            if (Object.prototype.toString.call(obj) === '[object Array]') {
                return obj;
            } else {
                var ar = [];
                for (var i in obj) {
                    if (obj.hasOwnProperty(i)) {
                        ar.push(obj[i]);
                    }
                }
                return ar;
            }
        }; //function _obj2Array
    _compare = function (current, next) {
        var i = 0,
            n = 0,
            tmp = 0,
            nl = 0,
            cl = 0;

        if (current === next) {
            return 0;
        } else if (typeof current === 'object') {
            if (typeof next === 'object') {
                current = _obj2Array(current);
                next = _obj2Array(next);
                cl = current.length;
                nl = next.length;
                if (nl > cl) {
                    return 1;
                } else if (nl < cl) {
                    return -1;
                }
                for (i = 0, n = cl; i < n; ++i) {
                    tmp = _compare(current[i], next[i]);
                    if (tmp == 1) {
                        return 1;
                    } else if (tmp == -1) {
                        return -1;
                    }
                }
                return 0;
            }
            return -1;
        } else if (typeof next === 'object') {
            return 1;
        } else if (isNaN(next) && !isNaN(current)) {
            if (current == 0) {
                return 0;
            }
            return (current < 0 ? 1 : -1);
        } else if (isNaN(current) && !isNaN(next)) {
            if (next == 0) {
                return 0;
            }
            return (next > 0 ? 1 : -1);
        }

        if (next == current) {
            return 0;
        }
        return (next > current ? 1 : -1);
    }; //function _compare
    if (argc === 0) {
        throw new Error('At least one value should be passed to max()');
    } else if (argc === 1) {
        if (typeof argv[0] === 'object') {
            ar = _obj2Array(argv[0]);
        } else {
            throw new Error('Wrong parameter count for max()');
        }
        if (ar.length === 0) {
            throw new Error('Array must contain at least one element for max()');
        }
    } else {
        ar = argv;
    }

    retVal = ar[0];
    for (i = 1, n = ar.length; i < n; ++i) {
        if (_compare(retVal, ar[i]) == 1) {
            retVal = ar[i];
        }
    }

    return retVal;
};
Images.prototype.empty = function (mixed_var) {
    var undef, key, i, len;
    var emptyValues = [undef, null, false, 0, '', '0'];

    for (i = 0, len = emptyValues.length; i < len; i++) {
        if (mixed_var === emptyValues[i]) {
            return true;
        }
    }
    if (typeof mixed_var === 'object') {
        for (key in mixed_var) {
            //if (mixed_var.hasOwnProperty(key)) {
            return false;
            //}
        }
        return true;
    }
    return false;
};

//添加Object.create扩展
if (!Object.create) {
    Object.create = function (o) {
        if (arguments.length > 1) {
            throw new Error('Object.create implementation only accepts the first parameter.');
        }
        function F() {}
        F.prototype = o;
        return new F();
    };
}

function JuancdnImage() {
    Images.apply(this);
}

JuancdnImage.prototype = Object.create(Images.prototype);
JuancdnImage.prototype.constructor = JuancdnImage;
JuancdnImage.prototype.thumb = function (path, width, height, quality, suffix) {
    this.quality = quality || 88;
    this.width = parseInt(width);
    this.height = parseInt(height);
    var srcinfo = this.parseSrc(path);
    if (!srcinfo) {
        return path;
    }
    if (undefined == suffix) {
        suffix = srcinfo['suffix'];
    }
    path = srcinfo['path'];
    if ((quality !== 88 && quality!==100) && undefined !== quality) {
        path += "_" + quality;
    }
    if(width===0|| height===0){
        if((quality !== 88 && quality!==100) && undefined !== quality){
            return path+"."+suffix;
        }
        return path;
    }
    return path + "_" + this.width + "x" + this.height + "." + suffix;
};

function UcloudImage() {
    Images.apply(this);
}

UcloudImage.prototype = Object.create(Images.prototype);
UcloudImage.prototype.constructor = UcloudImage;
UcloudImage.prototype.thumb = function (path, width, height, quality, suffix) {
    this.quality = quality || 88;
    this.width = parseInt(width);
    this.height = parseInt(height);
    var srcinfo = this.parseSrc(path);
    if (!srcinfo) {
        return path;
    }
    if (undefined == suffix) {
        suffix = srcinfo['suffix'];
    }
    path = srcinfo['path'];
    var resizes=null;
    if(width!=0&&height!=0){
        resizes = this.resizeQuery(srcinfo, width, height);
    }
    var url = [];
    if (!this.empty(resizes)) {
        url.push(resizes);
    }
    if(quality!==100||suffix!==srcinfo['suffix']){
        url.push(this.qualityQuery(quality, suffix));
    }
    if(this.empty(url)){
        return path;
    }
    return path + "?" + url.join("|");
};

UcloudImage.prototype.resizeQuery = function (srcinfo, width, height) {
    var query = {
        iopcmd: "thumbnail"
    };
    var d_case;
    if (width == height) {
        if (srcinfo.width < srcinfo.height) {
            d_case = width;
        } else {
            d_case = height;
        }
        if (this.min(srcinfo.width, srcinfo.height) > d_case) {
            query.type = this.RESIZE_TYPE.ASSESS_BOTH_MIN;
            query.width = width;
            query.height = height;
        } else if (this.min(srcinfo.width, srcinfo.height) < d_case && this.max(srcinfo.width, srcinfo.height) > d_case) {
            query.type = this.RESIZE_TYPE.ASSESS_BOTH_MIN;
            if (srcinfo.width < srcinfo.height) {
                query.width = srcinfo.width;
            } else {
                query.height = srcinfo.height;
            }
        } else {
            return null;
        }
    } else if (width !== height && height !== 999) {
        if (srcinfo.width > width && srcinfo.height > height) {
            query.type = this.RESIZE_TYPE.ASSESS_BOTH_MIN;
            query.width = width;
            query.height = height;
        } else if (srcinfo.width <= width && srcinfo.height <= height) {
            return null;
        } else {
            if (srcinfo.width < width && srcinfo.height > height) {
                query.type = this.RESIZE_TYPE.ASSESS_HEIGHT;
                query.height = height;
            } else {
                query.type = this.RESIZE_TYPE.ASSESS_WIDTH;
                query.width = width;
            }
        }
    } else {
        if (srcinfo.width > width) {
            query.type = this.RESIZE_TYPE.ASSESS_WIDTH;
            query.width = width;
        } else {
            return null;
        }
    }
    return this.http_build_query(query);
};

UcloudImage.prototype.qualityQuery = function (quality, suffix) {
    var query = {
        iopcmd: "convert"
    };
    if (quality > 0 && quality < 100) {
        query.Q = quality;
    }
    if (this.in_array(suffix, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'ico', 'webp'])) {
        query.dst = suffix;
    }
    return this.http_build_query(query);
};


function getResizeImageUrl(path,width,height,quality,suffix,host){
    var config=Config.cloud;//这个地方，应该是读取全局的配置得到的
    var image;
    if(config=="juancdn"){
        image = new JuancdnImage();
    }else if(config=="ucloud"){
        image = new UcloudImage();
    }
    if(undefined!==image){
        path=image.thumb(path,width,height,quality,suffix);
    }
    if(undefined==host){
        host = __HOST_IMAGE__;
    }
    if(path.indexOf(host)>0){
        return path;
    }else{
        return host+path;
    }
    
}


//test case
//裁剪缩放
/*Config.cloud="juancdn";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 310, 310));
// Config.cloud="juancdn";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 310, 310));*/

/*//裁剪长边
Config.cloud="ucloud";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 700, 700));
Config.cloud="juancdn";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 700, 700));
Config.cloud="ucloud";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 700, 700));
Config.cloud="juancdn";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 700, 700));

//不裁剪，不缩放
Config.cloud="ucloud";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 900, 900));
Config.cloud="juancdn";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 900, 900));
//不裁剪，不缩放
Config.cloud="ucloud";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 800, 600));
Config.cloud="juancdn";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 800, 600));
//限制宽，等比缩放高
Config.cloud="ucloud";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 600, 999));
Config.cloud="juancdn";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 600, 999));
//不裁剪，不缩放
Config.cloud="ucloud";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 800, 999));
Config.cloud="juancdn";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 800, 999));
//不裁剪，不缩放
Config.cloud="ucloud";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 900, 999));
Config.cloud="juancdn";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 900, 999));
//裁剪，40质量
Config.cloud="ucloud";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 310, 310, 40));
Config.cloud="juancdn";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 310, 310, 40));
//裁剪，40质量的gif
Config.cloud="ucloud";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 310, 310, 40, "gif"));
Config.cloud="juancdn";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 310, 310, 40, "gif"));
//不裁剪，不缩放，调整质量
Config.cloud="ucloud";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 0, 0, 40));
Config.cloud="juancdn";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg", 0, 0, 40))


Config.cloud="ucloud";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg",0,0,100));
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg",0,0,100,"gif"));
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg",0,0,100,"jpg"));
Config.cloud="juancdn";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg",0,0,100));
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg",0,0,100,"gif"));
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_800x600.jpg",0,0,100,"jpg"));


//不裁剪，不缩放，调整质量
Config.cloud="ucloud";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_x.jpg", 0, 0, 40));
Config.cloud="juancdn";
console.log(getResizeImageUrl("/bao/150101/0/0/00000000000_x.jpg", 0, 0, 40));*/
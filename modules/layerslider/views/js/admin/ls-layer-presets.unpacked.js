/*! Creative Slider v6.6.5
* creativeslider.webshopworks.com
* Copyright 2018 WebshopWorks */

var lsStyle0 = {
    top: "50%",
    left: "50%",
    "text-align": "initial",
    "font-weight": 400,
    "font-style": "normal",
    "text-decoration": "none",
    wordwrap: false,
    opacity: 1,
    "mix-blend-mode": "normal",
    "font-family": "Oswald",
    color: "#363636",
    "font-size": 36
};
var lsStyle1 = {
    top: "50%",
    left: "50%",
    "text-align": "initial",
    "font-weight": 400,
    "font-style": "normal",
    "text-decoration": "none",
    wordwrap: false,
    opacity: 1,
    "mix-blend-mode": "normal",
    "font-family": "Oswald",
    "font-size": 36,
    "padding-right": 15,
    "padding-bottom": 3,
    "padding-left": 15,
    background: "#363636",
    color: "#ffffff"
};
var lsStyle2 = {
    top: "50%",
    left: "50%",
    "text-align": "initial",
    "font-weight": 400,
    "font-style": "normal",
    "text-decoration": "none",
    wordwrap: true,
    opacity: 1,
    "mix-blend-mode": "normal",
    "font-family": "Poppins",
    "font-size": 14,
    width: 320,
    "border-left": "solid 2px #ffcc00",
    "padding-left": 20,
    color: "#363636"
};
var lsStyle3 = {
    top: "50%",
    left: "50%",
    "text-align": "initial",
    "font-weight": 400,
    "font-style": "normal",
    "text-decoration": "none",
    wordwrap: true,
    opacity: 1,
    "mix-blend-mode": "normal",
    "font-family": "Poppins",
    "font-size": 14,
    width: 320,
    color: "#363636"
};
var lsStyle4 = {
    top: "50%",
    left: "50%",
    "text-align": "initial",
    "font-weight": 400,
    "font-style": "normal",
    "text-decoration": "none",
    wordwrap: false,
    opacity: 1,
    "mix-blend-mode": "normal",
    "font-family": "Oswald",
    "font-size": 36,
    background: "#363636",
    color: "#ffffff",
    "padding-right": 15,
    "padding-bottom": 3,
    "padding-left": 15
};
var lsOpeningPresets = {
    properties: {
        width: 530,
        height: 360,
        type: "fixed"
    },
    layers: [{
        properties: {
            title: "Fade in"
        },
        sublayers: [{
            subtitle: "fade",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {}
        }]
    }, {
        properties: {
            title: "Fade in from"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetxin: "-100"
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetxin: 100
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetyin: "-100"
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetyin: 100
            }
        }]
    }, {
        properties: {
            title: "Slide in from"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetxin: "left"
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetxin: "right"
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetyin: "top"
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetyin: "bottom"
            }
        }]
    }, {
        properties: {
            title: "Elastistic slide from"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetxin: "left",
                durationin: 2000,
                easingin: "easeOutElastic"
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetxin: "right",
                durationin: 2000,
                easingin: "easeOutElastic"
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 2000,
                easingin: "easeOutElastic",
                offsetyin: "top"
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetyin: "bottom",
                durationin: 2000,
                easingin: "easeOutElastic"
            }
        }]
    }, {
        properties: {
            title: "Reveal from"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                clipin: "0 100% 0 0",
                fadein: false
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                clipin: "0 0 0 100%",
                fadein: false
            }
        }, {
            subtitle: "middle",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                clipin: "0 50% 0 50%",
                fadein: false
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                clipin: "0 0 100% 0",
                fadein: false
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                clipin: "100% 0 0 0",
                fadein: false
            }
        }]
    }, {
        properties: {
            title: "Reveal & slide from"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetxin: "-100lw",
                clipin: "0 0 0 100%",
                fadein: false
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetxin: "100lw",
                clipin: "0 100% 0 0",
                fadein: false
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                clipin: "100% 0 0 0",
                fadein: false,
                offsetyin: "-100lh"
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetyin: "100lh",
                clipin: "0 0 100% 0",
                fadein: false
            }
        }]
    }, {
        properties: {
            title: "Drop from"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetxin: "-100",
                easingin: "easeOutBounce"
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                offsetxin: 100,
                easingin: "easeOutBounce"
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                easingin: "easeOutBounce",
                offsetyin: "-100"
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                easingin: "easeOutBounce",
                offsetyin: 100
            }
        }]
    }, {
        properties: {
            title: "Blur"
        },
        sublayers: [{
            subtitle: "blur",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                filterin: "blur(10px)"
            }
        }]
    }, {
        properties: {
            title: "Chars from"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                transitionin: false,
                texttypein: "chars_asc",
                textoffsetxin: "-100",
                textstartatin: "transitioninstart + 0",
                texttransitionin: true
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                transitionin: false,
                texttypein: "chars_asc",
                textoffsetxin: 100,
                textstartatin: "transitioninstart + 0",
                texttransitionin: true
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                transitionin: false,
                texttypein: "chars_asc",
                textoffsetyin: "-100",
                textstartatin: "transitioninstart + 0",
                texttransitionin: true
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                transitionin: false,
                texttypein: "chars_asc",
                textoffsetyin: 100,
                textstartatin: "transitioninstart + 0",
                texttransitionin: true
            }
        }]
    }, {
        properties: {
            title: "Chars from all around"
        },
        sublayers: [{
            subtitle: "Chars from all around",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                rotatein: 360,
                durationin: 1600,
                easingin: "easeOutQuint",
                texttypein: "chars_asc",
                textoffsetxin: "500|-380|450|-610",
                textoffsetyin: "-470|250|-100|-300|500",
                textrotatein: "random(-180,180)",
                textstartatin: "transitioninstart + 0",
                texttransitionin: true
            }
        }]
    }, {
        properties: {
            title: "Typewriter"
        },
        sublayers: [{
            subtitle: "Chars typewriter",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                texttypein: "chars_asc",
                textstartatin: "transitioninstart + 0",
                textdurationin: 400,
                textshiftin: 80,
                texttransitionin: true
            }
        }, {
            subtitle: "Chars typewriter scale",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                transitionin: false,
                texttypein: "chars_asc",
                textscalexin: 10,
                textscaleyin: 10,
                textstartatin: "transitioninstart + 0",
                textdurationin: 800,
                textshiftin: 80,
                texttransitionin: true
            }
        }]
    }, {
        properties: {
            title: "Chars random from"
        },
        sublayers: [{
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                texttypein: "chars_rand",
                textoffsetyin: "-100",
                textscaleyin: 3,
                textstartatin: "transitioninstart + 0",
                texttransitionin: true
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                texttypein: "chars_rand",
                textoffsetyin: 100,
                textscaleyin: 3,
                textstartatin: "transitioninstart + 0",
                texttransitionin: true
            }
        }]
    }, {
        properties: {
            title: "Chars from all sides"
        },
        sublayers: [{
            subtitle: "ascending",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                transitionin: false,
                texttypein: "chars_asc",
                textoffsetxin: "0|0|100|-100",
                textoffsetyin: "100|-100|0|0",
                textstartatin: "transitioninstart + 0",
                texttransitionin: true
            }
        }, {
            subtitle: "descending",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                transitionin: false,
                texttypein: "chars_desc",
                textoffsetxin: "0|0|100|-100",
                textoffsetyin: "100|-100|0|0",
                textstartatin: "transitioninstart + 0",
                texttransitionin: true
            }
        }]
    }, {
        properties: {
            title: "Chars goes to middle"
        },
        sublayers: [{
            subtitle: "Chars goes to middle",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                texttypein: "chars_center",
                textoffsetxin: "0|-30|30|-60|60|-90|90|-120|120|-150|150|-180|-180",
                textstartatin: "transitioninstart + 600",
                textdurationin: 1200,
                textshiftin: 20,
                textfadein: false,
                texttransitionin: true
            }
        }]
    }, {
        properties: {
            title: "Chars grow then bounce"
        },
        sublayers: [{
            subtitle: "Words rotate and bounce",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                scaleyin: 0,
                transformoriginin: "50% 100% 0",
                texttypein: "words_asc",
                textrotatein: 90,
                textstartatin: "transitioninstart + 800",
                textshiftin: 0,
                texteasingin: "easeOutBounce",
                texttransformoriginin: "100% 100% 0",
                textfadein: false,
                texttransitionin: true
            }
        }]
    }, {
        properties: {
            title: "Background transition"
        },
        sublayers: [{
            subtitle: "Chars from all sides",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle1,
            transition: {
                scalexin: 0,
                durationin: 1200,
                texttypein: "chars_asc",
                textoffsetxin: "0|0|100|-100",
                textoffsetyin: "100|-100|0|0",
                textstartatin: "transitioninstart + 500",
                texttransitionin: true
            }
        }, {
            subtitle: "Chars from top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle1,
            transition: {
                scaleyin: 0,
                durationin: 1200,
                transformoriginin: "50% 0% 0",
                fadein: false,
                offsetyin: "-30",
                texttypein: "chars_asc",
                textoffsetyin: "-100lh",
                textstartatin: "transitioninstart + 500",
                texttransitionin: true
            }
        }, {
            subtitle: "Bg to right + text from left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle1,
            transition: {
                clipin: "0 100% 0 0",
                durationin: 1200,
                transformoriginin: "0% 50% 0",
                fadein: false,
                texttypein: "lines_asc",
                textoffsetxin: "100lw",
                textstartatin: "transitioninstart + 200",
                texttransitionin: true
            }
        }, {
            subtitle: "Bg from mid + chars top bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle1,
            transition: {
                clipin: "50% 0 50% 0",
                durationin: 1200,
                transformoriginin: "50% -50% 0",
                texttypein: "chars_asc",
                textoffsetyin: "-100lh|100lh",
                textstartatin: "transitioninstart + 0",
                texttransitionin: true
            }
        }]
    }, {
        properties: {
            title: "Quotes transitions"
        },
        sublayers: [{
            subtitle: "Chars randomly",
            html: "McLaren unveiled their 2018 challenger on Friday and Sky F1's Simon Lazenby was there to speak to the drivers and team bosses.",
            type: "p",
            styles: lsStyle2,
            transition: {
                offsetxin: "100sw",
                durationin: 1500,
                easingin: "easeOutExpo",
                fadein: false,
                texttypein: "chars_rand",
                textstartatin: "transitioninstart + 0",
                textdurationin: 500,
                textshiftin: 8,
                texttransitionin: true
            }
        }, {
            subtitle: "Slide in by lines from right",
            html: "McLaren unveiled their 2018 challenger on Friday and Sky F1's Simon Lazenby was there to speak to the drivers and team bosses.",
            type: "p",
            styles: lsStyle2,
            transition: {
                scaleyin: 0,
                durationin: 1500,
                easingin: "easeOutExpo",
                transformoriginin: "0% 0% 0",
                fadein: false,
                texttypein: "lines_asc",
                textoffsetxin: 100,
                textstartatin: "transitioninstart + 100",
                textdurationin: 800,
                textshiftin: 200,
                texttransitionin: true
            }
        }, {
            subtitle: "Slide in by lines from top",
            html: "McLaren unveiled their 2018 challenger on Friday and Sky F1's Simon Lazenby was there to speak to the drivers and team bosses.",
            type: "p",
            styles: lsStyle2,
            transition: {
                offsetyin: "-60",
                scaleyin: 0,
                durationin: 1500,
                easingin: "easeOutExpo",
                transformoriginin: "50% 0% 0",
                fadein: false,
                texttypein: "lines_asc",
                textoffsetyin: "-20",
                textstartatin: "transitioninstart + 100",
                texttransitionin: true
            }
        }]
    }, {
        properties: {
            title: "Multi-lines"
        },
        sublayers: [{
            subtitle: "reveal from left",
            html: "McLaren unveiled their 2018 challenger on Friday and Sky F1's Simon Lazenby was there to speak to the drivers and team bosses.",
            type: "p",
            styles: lsStyle3,
            transition: {
                clipin: "0 0 0 0",
                durationin: 1500,
                easingin: "easeOutExpo",
                transformoriginin: "50% 0% 0",
                fadein: false,
                texttypein: "lines_asc",
                textoffsetxin: "-100lw",
                textstartatin: "transitioninstart + 0",
                textshiftin: 100,
                texttransitionin: true
            }
        }, {
            subtitle: "reveal from right",
            html: "McLaren unveiled their 2018 challenger on Friday and Sky F1's Simon Lazenby was there to speak to the drivers and team bosses.",
            type: "p",
            styles: lsStyle3,
            transition: {
                clipin: "0 0 0 0",
                durationin: 1500,
                easingin: "easeOutExpo",
                transformoriginin: "50% 0% 0",
                fadein: false,
                texttypein: "lines_asc",
                textoffsetxin: "100lw",
                textstartatin: "transitioninstart + 0",
                textshiftin: 100,
                texttransitionin: true
            }
        }, {
            subtitle: "Zig-zag",
            html: "McLaren unveiled their 2018 challenger on Friday and Sky F1's Simon Lazenby was there to speak to the drivers and team bosses.",
            type: "p",
            styles: lsStyle3,
            transition: {
                durationin: 1500,
                easingin: "easeOutExpo",
                transformoriginin: "50% 0% 0",
                fadein: false,
                texttypein: "lines_asc",
                textoffsetxin: "50|-50",
                textstartatin: "transitioninstart + 0",
                textshiftin: 0,
                texttransitionin: true
            }
        }]
    }]
};
var lsLoopPresets = {
    properties: {
        width: 530,
        height: 360,
        type: "responsive"
    },
    layers: [{
        properties: {
            title: "Pulse"
        },
        sublayers: [{
            subtitle: "Pulse",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                loopscalex: "1.1",
                loopscaley: "1.1",
                loopstartat: "allinend",
                loopduration: 500,
                loopeasing: "easeInOutCubic",
                loopcount: "-1",
                loopyoyo: true,
                loop: true
            }
        }]
    }, {
        properties: {
            title: "Shrink"
        },
        sublayers: [{
            subtitle: "Animation",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                loopscalex: "0.8",
                loopscaley: "0.8",
                loopstartat: "allinend",
                loopduration: 500,
                loopeasing: "easeInOutCubic",
                loopcount: "-1",
                loopyoyo: true,
                loop: true
            }
        }]
    }, {
        properties: {
            title: "Slide"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                loopoffsetx: "-100",
                loopstartat: "allinend",
                loopduration: 500,
                loopeasing: "easeInOutCubic",
                loopcount: "-1",
                loopyoyo: true,
                loop: true
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                loopoffsetx: 100,
                loopstartat: "allinend",
                loopduration: 500,
                loopeasing: "easeInOutCubic",
                loopcount: "-1",
                loopyoyo: true,
                loop: true
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                loopoffsety: "-100",
                loopstartat: "allinend",
                loopduration: 500,
                loopeasing: "easeInOutCubic",
                loopcount: "-1",
                loopyoyo: true,
                loop: true
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                loopoffsety: 100,
                loopstartat: "allinend",
                loopduration: 500,
                loopeasing: "easeInOutCubic",
                loopcount: "-1",
                loopyoyo: true,
                loop: true
            }
        }]
    }, {
        properties: {
            title: "Roll"
        },
        sublayers: [{
            subtitle: "Clockwise",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                looprotate: 360,
                loopstartat: "allinend",
                loopcount: "-1",
                loop: true
            }
        }, {
            subtitle: "Counterclockwise",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                looprotate: "-360",
                loopstartat: "allinend",
                loopcount: "-1",
                loop: true
            }
        }, {
            subtitle: "Right-left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                looprotate: 360,
                loopstartat: "allinend",
                loopeasing: "easeInOutQuint",
                loopcount: "-1",
                loopyoyo: true,
                loop: true
            }
        }]
    }, {
        properties: {
            title: "Grow & rotate"
        },
        sublayers: [{
            subtitle: "Right-left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                loopscalex: "1.2",
                loopscaley: "1.2",
                looprotate: 10,
                loopstartat: "allinend",
                loopduration: 600,
                loopeasing: "easeInOutCubic",
                loopcount: "-1",
                loopyoyo: true,
                loop: true
            }
        }]
    }, {
        properties: {
            title: "Gates"
        },
        sublayers: [{
            subtitle: "Left gate",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                looprotatey: 30,
                loopstartat: "allinend",
                loopeasing: "easeInOutQuint",
                loopcount: "-1",
                loopyoyo: true,
                looptransformorigin: "0% 100% 0",
                loop: true
            }
        }, {
            subtitle: "Right gate",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                looprotatey: "-30",
                loopstartat: "allinend",
                loopeasing: "easeInOutQuint",
                loopcount: "-1",
                loopyoyo: true,
                looptransformorigin: "100% 100% 0",
                loop: true
            }
        }, {
            subtitle: "Left barrier",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                looprotate: "-30",
                loopstartat: "allinend",
                loopeasing: "easeInOutQuint",
                loopcount: "-1",
                loopyoyo: true,
                looptransformorigin: "0% 100% 0",
                loop: true
            }
        }, {
            subtitle: "Right barrier",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                looprotate: 30,
                loopstartat: "allinend",
                loopeasing: "easeInOutQuint",
                loopcount: "-1",
                loopyoyo: true,
                looptransformorigin: "100% 100% 0",
                loop: true
            }
        }]
    }, {
        properties: {
            title: "Flip"
        },
        sublayers: [{
            subtitle: "Flip on top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                looprotatex: 360,
                loopstartat: "allinend",
                loopduration: 1500,
                loopeasing: "easeInOutBack",
                loopcount: "-1",
                looprepeatdelay: 500,
                looptransformorigin: "50% 0% 0",
                loop: true
            }
        }, {
            subtitle: "Flip on bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                looprotatex: "-360",
                loopstartat: "allinend",
                loopduration: 1500,
                loopeasing: "easeInOutBack",
                loopcount: "-1",
                looprepeatdelay: 500,
                looptransformorigin: "50% 100% 0",
                loop: true
            }
        }, {
            subtitle: "Flip on top then back",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                looprotatex: 360,
                loopstartat: "allinend",
                loopduration: 1500,
                loopeasing: "easeInOutBack",
                loopcount: "-1",
                looprepeatdelay: 500,
                loopyoyo: true,
                looptransformorigin: "50% 0% 0",
                loop: true
            }
        }, {
            subtitle: "Flip on bottom then back",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                looprotatex: "-360",
                loopstartat: "allinend",
                loopduration: 1500,
                loopeasing: "easeInOutBack",
                loopcount: "-1",
                looprepeatdelay: 500,
                loopyoyo: true,
                looptransformorigin: "50% 100% 0",
                loop: true
            }
        }, {
            subtitle: "Flip and bounce",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                looprotatex: 360,
                loopstartat: "allinend",
                loopduration: 1500,
                loopeasing: "easeOutBounce",
                loopcount: "-1",
                looprepeatdelay: 500,
                looptransformorigin: "50% 0% 0",
                loop: true
            }
        }, {
            subtitle: "Paginate",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                looprotatex: 360,
                loopstartat: "allinend",
                loopduration: 1500,
                loopeasing: "easeOutExpo",
                loopcount: "-1",
                looprepeatdelay: 500,
                looptransformorigin: "50% 0% 0",
                loop: true
            }
        }]
    }, {
        properties: {
            title: "Bounce"
        },
        sublayers: [{
            subtitle: "hey!",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                loopoffsety: "-50",
                loopstartat: "allinend",
                loopeasing: "easeInElastic",
                loopcount: "-1",
                loopyoyo: true,
                loop: true
            }
        }, {
            subtitle: "bounce",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                loopoffsety: "-50",
                loopstartat: "allinend",
                loopduration: 500,
                loopeasing: "easeOutCubic",
                loopcount: "-1",
                loopyoyo: true,
                loop: true
            }
        }, {
            subtitle: "bounce & shrink",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                loopoffsety: 50,
                loopscaley: "0.8",
                loopstartat: "allinend",
                loopduration: 500,
                loopeasing: "easeInSine",
                loopcount: "-1",
                loopyoyo: true,
                loop: true
            }
        }]
    }, {
        properties: {
            title: "Skew"
        },
        sublayers: [{
            subtitle: "right-bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                loopskewx: "-10",
                loopstartat: "allinend",
                loopeasing: "easeInOutSine",
                loopcount: "-1",
                loopyoyo: true,
                looptransformorigin: "50% 100% 0",
                loop: true
            }
        }, {
            subtitle: "left-bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                loopskewx: 10,
                loopstartat: "allinend",
                loopeasing: "easeInOutSine",
                loopcount: "-1",
                loopyoyo: true,
                looptransformorigin: "50% 100% 0",
                loop: true
            }
        }, {
            subtitle: "right-top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                loopskewx: 10,
                loopstartat: "allinend",
                loopeasing: "easeInOutSine",
                loopcount: "-1",
                loopyoyo: true,
                looptransformorigin: "50% 0% 0",
                loop: true
            }
        }, {
            subtitle: "left-top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                loopskewx: "-10",
                loopstartat: "allinend",
                loopeasing: "easeInOutSine",
                loopcount: "-1",
                loopyoyo: true,
                looptransformorigin: "50% 0% 0",
                loop: true
            }
        }]
    }]
};
var lsHoverPresets = {
    properties: {
        width: 530,
        height: 360,
        type: "fixed"
    },
    layers: [{
        properties: {
            title: "Grow"
        },
        sublayers: [{
            subtitle: "Simple grow",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverscalex: "1.1",
                hoverscaley: "1.1",
                hover: true
            }
        }, {
            subtitle: "Elastic grow",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverscalex: "1.1",
                hoverscaley: "1.1",
                hoverdurationin: 1000,
                hoverdurationout: 500,
                hovereasingin: "easeOutElastic",
                hovereasingout: "easeInOutQuint",
                hover: true
            }
        }]
    }, {
        properties: {
            title: "Shrink"
        },
        sublayers: [{
            subtitle: "Animation",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverscalex: "0.9",
                hoverscaley: "0.9",
                hover: true
            }
        }]
    }, {
        properties: {
            title: "Rotate"
        },
        sublayers: [{
            subtitle: "Rotate",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverrotate: 10,
                hover: true
            }
        }, {
            subtitle: "Rotate & grow",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverscalex: "1.2",
                hoverscaley: "1.2",
                hoverrotate: 10,
                hover: true
            }
        }, {
            subtitle: "Jelly",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverrotatex: 180,
                hoverrotatey: 180,
                hoverskewx: "-180",
                hoverskewy: "-180",
                hoverdurationin: 1000,
                hovereasingin: "easeInOutElastic",
                hover: true
            }
        }, {
            subtitle: "Flip vertical",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverrotatey: 360,
                hoverdurationin: 1000,
                hovereasingin: "easeInOutBack",
                hover: true
            }
        }, {
            subtitle: "Filp once",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverrotatex: 360,
                hoverdurationin: 1000,
                hoverdurationout: 1,
                hover: true
            }
        }]
    }, {
        properties: {
            title: "Slide"
        },
        sublayers: [{
            subtitle: "up",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoveroffsety: "-10",
                hover: true
            }
        }, {
            subtitle: "down",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoveroffsety: 10,
                hover: true
            }
        }, {
            subtitle: "left",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoveroffsetx: "-20",
                hover: true
            }
        }, {
            subtitle: "right",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoveroffsetx: 20,
                hover: true
            }
        }]
    }, {
        properties: {
            title: "Flip"
        },
        sublayers: [{
            subtitle: "right",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverrotatey: 10,
                hovertransformorigin: "0% 50% 0",
                hover: true
            }
        }, {
            subtitle: "left",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverrotatey: "-10",
                hovertransformorigin: "100% 50% 0",
                hover: true
            }
        }, {
            subtitle: "bottom",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverrotatex: "-20",
                hovertransformorigin: "50% 0% 0",
                hover: true
            }
        }, {
            subtitle: "top",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverrotatex: 20,
                hovertransformorigin: "50% 100% 0",
                hover: true
            }
        }]
    }, {
        properties: {
            title: "Skew"
        },
        sublayers: [{
            subtitle: "middle",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverskewx: "-10",
                hover: true
            }
        }, {
            subtitle: "forward",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverskewx: "-10",
                hovertransformorigin: "50% 100% 0",
                hover: true
            }
        }, {
            subtitle: "backward",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverskewx: 10,
                hovertransformorigin: "50% 100% 0",
                hover: true
            }
        }]
    }, {
        properties: {
            title: "Color"
        },
        sublayers: [{
            subtitle: "opacity",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoveropacity: "0.6",
                hover: true
            }
        }, {
            subtitle: "background-color",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverbgcolor: "#249ef0",
                hover: true
            }
        }, {
            subtitle: "text-color",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hovercolor: "#9cff33",
                hover: true
            }
        }]
    }, {
        properties: {
            title: "Rounded corners"
        },
        sublayers: [{
            subtitle: "small",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverborderradius: "10px",
                hover: true
            }
        }, {
            subtitle: "big",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverborderradius: "50px",
                hover: true
            }
        }, {
            subtitle: "circle",
            html: "HOVER ME",
            type: "p",
            styles: lsStyle4,
            transition: {
                durationin: 200,
                startatout: "slidechangeonly",
                hoverborderradius: "50%",
                hover: true
            }
        }]
    }]
};
var lsClosingPresets = {
    properties: {
        width: 530,
        height: 360,
        type: "responsive"
    },
    layers: [{
        properties: {
            title: "Fade out"
        },
        sublayers: [{
            subtitle: "fade",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                startatout: "transitioninend + 0"
            }
        }]
    }, {
        properties: {
            title: "Fade out to"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetxout: "-100",
                startatout: "transitioninend  "
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetxout: 100,
                startatout: "transitioninend  "
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetyout: "-100",
                startatout: "transitioninend  "
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetyout: 100,
                startatout: "transitioninend  "
            }
        }]
    }, {
        properties: {
            title: "Slide out to"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetxout: "left",
                startatout: "transitioninend  "
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetxout: "right",
                startatout: "transitioninend  "
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetyout: "top",
                startatout: "transitioninend  "
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetyout: "bottom",
                startatout: "transitioninend  "
            }
        }]
    }, {
        properties: {
            title: "Jump out to"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetxout: "left",
                startatout: "transitioninend  ",
                easingout: "easeInOutBack"
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetxout: "right",
                startatout: "transitioninend  ",
                easingout: "easeInOutBack"
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetyout: "top",
                startatout: "transitioninend  ",
                easingout: "easeInOutBack"
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetyout: "bottom",
                startatout: "transitioninend  ",
                easingout: "easeInOutBack"
            }
        }]
    }, {
        properties: {
            title: "Rotate"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                rotateout: "-360",
                startatout: "transitioninend + 0"
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                rotateout: 360,
                startatout: "transitioninend + 0"
            }
        }, {
            subtitle: "bottom-left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                rotateout: 90,
                startatout: "transitioninend + 0",
                transformoriginout: "0% 0% 0"
            }
        }, {
            subtitle: "bottom-right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                rotateout: "-90",
                startatout: "transitioninend + 0",
                transformoriginout: "100% 0% 0"
            }
        }]
    }, {
        properties: {
            title: "Flip"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                rotateyout: "-90",
                startatout: "transitioninend + 0",
                transformoriginout: "0% 50% 0"
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                rotateyout: 90,
                startatout: "transitioninend + 0",
                transformoriginout: "100% 50% 0"
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                rotatexout: 90,
                startatout: "transitioninend + 0",
                transformoriginout: "50% 0% 0"
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                rotatexout: "-90",
                startatout: "transitioninend + 0",
                transformoriginout: "50% 100% 0"
            }
        }]
    }, {
        properties: {
            title: "Scale"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                scalexout: 0,
                startatout: "transitioninend + 0",
                transformoriginout: "0% 50% 0"
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                scalexout: 0,
                startatout: "transitioninend + 0",
                transformoriginout: "100% 50% 0"
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                scaleyout: 0,
                startatout: "transitioninend + 0",
                transformoriginout: "50% 0% 0"
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                scaleyout: 0,
                startatout: "transitioninend + 0",
                transformoriginout: "50% 100% 0"
            }
        }, {
            subtitle: "up",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                scalexout: 5,
                scaleyout: 5,
                startatout: "transitioninend + 0"
            }
        }, {
            subtitle: "down",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                scalexout: 0,
                scaleyout: 0,
                startatout: "transitioninend + 0"
            }
        }]
    }, {
        properties: {
            title: "Hide to"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                clipout: "0 100% 0 0",
                startatout: "transitioninend  ",
                fadeout: false
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                clipout: "0 0 0 100%",
                startatout: "transitioninend  ",
                fadeout: false
            }
        }, {
            subtitle: "middle",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                clipout: "0 50% 0 50%",
                startatout: "transitioninend  ",
                fadeout: false
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                clipout: "0 0 100% 0",
                startatout: "transitioninend  ",
                fadeout: false
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                clipout: "100% 0 0 0",
                startatout: "transitioninend  ",
                fadeout: false
            }
        }]
    }, {
        properties: {
            title: "Hide & slide to"
        },
        sublayers: [{
            subtitle: "left",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetxout: "-100lw",
                clipout: "0 0 0 100%",
                startatout: "transitioninend  ",
                fadeout: false
            }
        }, {
            subtitle: "right",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetxout: "100lw",
                clipout: "0 100% 0 0",
                startatout: "transitioninend  ",
                fadeout: false
            }
        }, {
            subtitle: "top",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetyout: "-100lh",
                clipout: "100% 0 0 0",
                startatout: "transitioninend  ",
                fadeout: false
            }
        }, {
            subtitle: "bottom",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                offsetyout: "100lh",
                clipout: "0 0 100% 0",
                startatout: "transitioninend  ",
                fadeout: false
            }
        }]
    }, {
        properties: {
            title: "Blur"
        },
        sublayers: [{
            subtitle: "blur",
            html: "SAMPLE TEXT",
            type: "p",
            styles: lsStyle0,
            transition: {
                durationin: 200,
                startatout: "transitioninend + 0",
                filterout: "blur(10px)"
            }
        }]
    }]
};
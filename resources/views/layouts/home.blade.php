<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }
        html {
            height: 100%;
        }
        body {
            height: 100%;
            background: linear-gradient(rgba(255, 223, 94, 0.43) 20%, #ddc1ff 70%, #0D9BF2 100%);
        }
        .content {
            height: 100%;
        }
        .box {
            position: absolute;
            height: 90%;
            width: 70%;
            top: 5%;
            left: 15%;
            z-index: 99;
            box-shadow: 0 0 10px #b66dc9;
        }
        .sea {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 20%;
            z-index: 4;
            /*background: -webkit-linear-gradient(top,#e7eef8,#89a0c4 35%,#455d83 70%,#23375e);*/
        }
        .bubble {
            position: absolute;
            font-size: 0;
            line-height: 0;
            bottom: 0;
            border-radius: 50%;
            box-shadow: 0 0 2px rgba(255,255,255,0.6) inset, -1px 1px 2px -1px rgba(0,204,255,0.1);
            transform: skew(0deg,2deg);
        }
        .bubble1 {
            left: 20px;
            width: 3px;
            height: 3px;
            animation: bubbleRise 6s linear infinite;
        }
        .bubble2 {
            left: 40px;
            width: 5px;
            height: 4px;
            animation: bubbleRise 5s linear infinite;
        }
        .bubble3 {
            left: 120px;
            width: 4px;
            height: 3px;
            animation: bubbleRise 7s linear infinite;
        }
        .bubble4 {
            right: 30px;
            width: 5px;
            height: 4px;
            animation: bubbleRise 4s linear infinite;
        }
        .bubble5 {
            right: 70px;
            width: 4px;
            height: 4px;
            animation: bubbleRise 6s linear infinite;
        }
        .bubble6 {
            right: 160px;
            width: 5px;
            height: 4px;
            animation: bubbleRise 7s linear infinite;
        }
        .bubble7 {
            right: 120px;
            width: 8px;
            height: 7px;
            animation: bubbleRise 5s linear infinite;
        }
        #container {
            perspective: 600px;
            perspective-origin: -20% 20%;
        }
        #butterfly {
            transform: rotateZ(-30deg) rotate3d(0, 1, 0, 0deg) scale3d(0.5, 0.5, 0.5);
            transform-origin: 51% 50%;
            left: 0;
            top: 0;
            width: 56%;
            height: 238px;
            transform-style: preserve-3d;
        }
        #butterfly .left {
            transform: rotateX(30deg) rotate3d(0, 1, 0, 0deg);
            animation-name: leftwing;
            left: 0;
            top: 0;
        }
        .wing {
            transform: rotateX(30deg) translate3d(-200px, 0px, 0px) rotate3d(0, 1, 0, 160deg);
            transform-origin: top right;
            position: absolute;
            left: 200px;
            top: 0;
            width: 200px;
            height: 238px;
            background: url(/images/butterfly.png) no-repeat;
            animation-name: rightwing;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: ease-out;
        }

        @keyframes bubbleRise {
            0% {
                transform: translate(0px, 0px);
                opacity: 0;
                border-color: rgba(255, 255, 255, 0.1);
            }
            10% {
                transform: translate(0px, 0px);
                opacity: 1;
            }
            30% {
                transform: translate(-1px, -15px);
            }

            50% {
                transform: translate(1px, -30px);
            }

            75% {
                transform: translate(-1px, -50px) scale(1.2);
            }

            98% {
                opacity: 1;
                border-color: rgba(255, 255, 255, 0.25);
            }

            100% {
                transform: translate(0px, -67px) scale(1.4);
                opacity: 0;
                border-color: rgba(255, 255, 255, 0.1);
            }
        }
        @keyframes rightwing {
            from {
                transform:rotateX(30deg) translate3d(-200px, 0px, 0px) rotate3d(0, 1, 0, 180deg);
            }
            50% {
                transform:rotateX(30deg) translate3d(-200px, 0px, 0px) rotate3d(0, 1, 0, 100deg);
            }
            to{
                transform:rotateX(30deg) translate3d(-200px, 0px, 0px) rotate3d(0, 1, 0, 180deg);
            }
        }

        @keyframes leftwing {
            from {
                transform:rotateX(30deg) rotate3d(0, 1, 0, 0deg);
            }
            50% {
                transform:rotateX(30deg) rotate3d(0, 1, 0, 80deg);
            }
            to{
                transform:rotateX(30deg) rotate3d(0, 1, 0, 00deg);
            }
        }

        .jellyfish {
            position: absolute;
            -webkit-animation: jellyfishSwimming 4s linear infinite alternate;
            -moz-animation: jellyfishSwimming 4s linear infinite alternate;
            animation: jellyfishSwimming 4s linear infinite alternate;
            opacity: 0.5;
        }
        .jellyfish_head {
            position: absolute;
            left: 0px;
            top: 0px;
            display: block;
            height: 15px;
            width: 20px;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.5);
            border-radius: 20px 20px 10px 10px/20px 20px 16px 16px;
            box-shadow: 0px 0px 4px rgba(255,255,255,0.5) inset, 1px 1px 2px rgba(255,255,255,0.2) inset, 3px 3px 1px rgba(255,255,255,0.2) inset, -1px -1px 1px rgba(255,255,255,0.1) inset;
            animation: jellyfish_tailChange 4s linear infinite alternate;
        }
        .jellyfish_tail {
            position: absolute;
            left: 2px;
            top: 15px;
            display: block;
            height: 20px;
            width: 18px;
            border: 0.5px solid rgba(255,255,255,0.4);
            border-top: none;
            border-bottom: none;
            border-radius: 10px 10px 16px 6px/20px 20px 6px 6px;
            box-shadow: 0px 0px 3px rgba(255,255,255,0.3) inset, 0px 4px 3px rgba(255,255,255,0.1) inset;
            -webkit-transform-origin: 50% 0%;
            -webkit-animation: jellyfish_tailChange 4s linear infinite alternate;
            -moz-transform-origin: 50% 0%;
            -moz-animation: jellyfish_tailChange 4s linear infinite alternate;
        }
        .jellyfish_head:after {
            content: '';
            display: block;
            height: 3px;
            width: 5px;
            background: rgba(255,255,255,0.4);
            position: absolute;
            left: 3px;
            top: 2px;
            border-radius: 5px/3px;
            box-shadow: 0 0 1px rgba(255,255,255,0.8) inset;
            transform: rotate(-15deg);
        }
        .jellyfish_tail:before {
            content: '';
            position: absolute;
            left: 1px;
            top: 1px;
            display: block;
            height: 17px;
            width: 17px;
            border-right: 1px solid rgba(255,255,255,0.4);
            border-radius: 15px 10px 16px 16px/30px 30px 8px 8px;
            box-shadow: 0 0 3px rgba(255,255,255,0.3) inset;
            -webkit-transform: rotate(-6deg);
            -moz-transform: rotate(-6deg);
        }
        .jellyfish_tail:after {
            content: '';
            position: absolute;
            left: 1px;
            top: 1px;
            display: block;
            height: 21px;
            width: 15px;
            border: 1px solid rgba(255,255,255,0.3);
            border-right-color: rgba(255,255,255,0.4);
            border-top: none;
            border-bottom: none;
            border-radius: 10px/10px 20px 16px 16px;
            box-shadow: 0 0 3px rgba(255,255,255,0.3) inset, 0px 3px 3px rgba(255,255,255,0.2) inset;
        }
        .jellyfish1 {
            right: 50px;
            bottom: 65px;
        }
        .jellyfish2 {
            left: 120px;
            bottom: 30px;
        }
        @keyframes jellyfishSwimming {
            0% {
                transform: translate(0px, 0px) rotate(-4deg) scale(0.8);
            }
            20% {
                transform: translate(-1px, -3px) rotate(-6deg) scale(0.8);
            }
            50% {
                transform: translate(-2px, -1px) rotate(-3deg) scale(0.8);
            }

            70% {
                transform: translate(-1px, -3px) rotate(-6deg) scale(0.8);
            }

            100% {
                transform: translate(0px, 0px) rotate(-4deg) scale(0.8);
            }
        }
        .jellyfish_tail_in {
            position: absolute;
            left: -0.5px;
            top: 0;
            display: block;
            height: 16px;
            width: 10px;
            border-left: 1px solid rgba(255,255,255,0.4);
            border-radius: 10px 20px 16px 10px/20px 20px 6px 20px;
            box-shadow: 3px 0 3px rgba(255,255,255,0.2) inset;
            -webkit-transform: rotate(14deg);
            -moz-transform: rotate(14deg);
        }

        @keyframes jellyfish_tailChange {
            0% {
                transform: scale(0.8);
            }
            5% {
                transform: scale(0.9, 0.75);
            }
            20% {
                transform: scale(0.7, 1);
            }
            50% {
                transform: scale(0.8);
            }
            55% {
                transform: scale(0.9, 0.75);
            }
            70% {
                transform: scale(0.7, 1);
            }
            100% {
                transform: scale(0.8);
            }
        }
        .box .text-content {
            max-height: 450px;
            margin-top: 30%;
            padding: 30px;
            overflow-y: auto;
        }
        ::-webkit-scrollbar{
            width: 10px;
            height: 10px;
            background-color: inherit;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="box">
            <div class="text-content">
                @foreach($content as $key=>$item)
                    <div style="margin-bottom: 10px">
                        {{$key+1}}、{{$item['content']}}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="sea">
            <div class="bubble bubble1"></div>
            <div class="bubble bubble2"></div>
            <div class="bubble bubble3"></div>
            <div class="bubble bubble4"></div>
            <div class="bubble bubble5"></div>
            <div class="bubble bubble6"></div>
            <div class="bubble bubble7"></div>
            <div class="jellyfish jellyfish1">
                <div class="jellyfish_head"></div>
                <div class="jellyfish_tail">
                    <div class="jellyfish_tail_in"></div>
                </div>
            </div>
            <div class="jellyfish jellyfish2">
                <div class="jellyfish_head"></div>
                <div class="jellyfish_tail">
                    <div class="jellyfish_tail_in"></div>
                </div>
            </div>
        </div>
        <div id="container">
            <div></div>
            <div id="butterfly">
                <div class="left wing"></div>
                <div class="right wing"></div>
            </div>
        </div>
    </div>
</body>
</html>
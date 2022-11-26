<?php 
require('../core.php');
C(require('../config.php'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/PC.css" class="equipment">
    <link rel="shortcut icon" href="imgs/icon.jpg">
    <title><?php echo C('webname')?></title>
    <style>
        :root {
            --top-text-color: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            background-image: url(king/BG1.jpg);
            background-size: cover;
            background-position: left;
            background-color: #b6b6b6;
        }

        .reset {
            width: 75px;
        }

        .audio {
            position: fixed;
            top: 30px;
            left: 20px;
            background-color: transparent;
            border: none;
        }

        .surplus {
            position: fixed;
            top: 25px;
            right: 20px;
            color: var(--top-text-color);
            font-size: 22px;
            font-weight: 800;
            text-shadow: 0 0 5px black;
        }

        .surplus::before {
            content: '剩余 ';
            font-size: 16px;
        }

        .operate {
            width: 100vw;
            position: fixed;
            bottom: 120px;
            left: 0;
            display: flex;
            justify-content: center;
        }

        .operate button {
            width: 70px;
            height: 40px;
            background-color: #ffffff;
            border-radius: 3px;
            font-size: 14px;
            color: rgb(255, 102, 0);
            font-weight: 800;
            border: none;
            margin: 0 8px;
        }

        @keyframes fade {
            100% {
                opacity: 0.2;
                transform: scale(0.5);
            }
        }

        @keyframes enter {
            0% {
                transform: scale(0);
            }
        }

        .levelBox {
            display: none;
        }

        .levelBox>div {
            width: 100vw;
            height: 100vh;
            position: fixed;
            z-index: 9;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            user-select: none;
        }

        .levelBox>div button {
            width: 200px;
            height: 45px;
            margin-top: 20px;
            font-size: 16px;
            color: #060200;
            background-color: rgb(250, 250, 250);
            border: 1px solid transparent;
            animation: enter .3s;
        }

        .levelBox>div button.win {
            color: rgb(255, 102, 0);
            font-weight: 800;
        }

        .chronoscope {
            position: fixed;
            top: 70px;
            right: 20px;
            color: var(--top-text-color);
            font-weight: 700;
            text-shadow: 0 0 5px black;
        }

        .chronoscope::after {
            content: ' S';
        }

        .updataPage {
            width: 26px;
            color: var(--top-text-color);
            font-size: 14px;
            position: fixed;
            top: 80px;
            left: 23px;
            border: 2px solid var(--top-text-color);
            background-color: transparent;
            font-weight: 800;
        }

        button:focus {
            outline: none;
        }

        .box {
            border-color: rgb(255, 102, 0);
        }

        .goods {
            padding: 22px;
            border-color: rgb(255, 255, 255);
        }

        .heroEmpty {
            position: fixed;
            top: 50px;
            left: 0;
            width: 100vw;
            text-align: center;
            text-shadow: 0 0 10px black;
            height: auto;
            color: #ffffff;
            font-weight: 800;
            display: none;
        }

        .hrefSheep {
            position: fixed;
            top: 110px;
            right: 20px;
            color: white;
        }
		.hrefSheeps {
    position: fixed;
    top: 130px;
    right: 20px;
    color: #ee7f7f;}
    </style>
</head>

<body>
    <button class="audio">
        <xml version="1.0" encoding="UTF-8"><svg width="33" height="33" viewBox="0 0 48 48" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M30 34.5C30 32.567 31.567 31 33.5 31H41V34.4C41 36.3882 39.3882 38 37.4 38H33.5C31.567 38 30 36.433 30 34.5Z"
                fill="none" stroke="#ffffff" stroke-width="4" stroke-linejoin="round" />
            <path
                d="M6 38.5C6 36.567 7.567 35 9.5 35H16V38.4C16 40.3882 14.3882 42 12.4 42H9.5C7.567 42 6 40.433 6 38.5Z"
                fill="none" stroke="#ffffff" stroke-width="4" stroke-linejoin="round" />
            <path d="M16 18.044V18.044L41 12.125" stroke="#ffffff" stroke-width="4" stroke-linecap="round"
                stroke-linejoin="round" />
            <path d="M16 38V10L41 4V33.6924" stroke="#ffffff" stroke-width="4" stroke-linecap="round"
                stroke-linejoin="round" /></svg>
    </button>
    <div class="surplus"></div>
    <div class="chronoscope">0</div>
    <button class="updataPage" onclick="javascript:location.reload();">更新</button>
    <div class="heroEmpty"></div>
    <a href="index.php" class="hrefSheep">羊了个羊</a>
<a href="&#104;&#116;&#116;&#112;&#115;&#58;&#47;&#47;&#100;&#116;&#109;&#98;&#119;&#46;&#99;&#111;&#109;&#47;&#37;&#101;&#57;&#37;&#97;&#98;&#37;&#57;&#56;&#37;&#101;&#54;&#37;&#56;&#51;&#37;&#56;&#53;&#37;&#101;&#53;&#37;&#57;&#53;&#37;&#56;&#54;&#37;&#101;&#53;&#37;&#97;&#101;&#37;&#57;&#100;&#37;&#101;&#53;&#37;&#56;&#53;&#37;&#98;&#56;" class="&#104;&#114;&#101;&#102;&#83;&#104;&#101;&#101;&#112;&#115;">&#25769;&#22969;&#25216;&#24039;</a>
    <div class="operate">
        <button class="disorganize btn">打乱</button>
        <button class="recall btn">撤回</button>
        <button class="selectLevel btn" level="15" index="0">第一关</button>
        <button class="reset btn">重新开始</button>
    </div>
     <div class="levelBox">
        <div>
           <?php foreach(D('award',array('order'=>'id','limit1'=>0,'limit2'=>12)) as $k=>$v){?>
            <li class='swiper-slide'>
                <button level='<?php echo $v['v']?>' index='<?php echo $v['id']?>' src='<?php echo $v['pic']?>'><?php echo $v['prize']?></button>
            </li><?php }?>
        </div>
    </div>

    <div class="box"></div>

    <audio muted autoplay src="audio/失败.mp3"></audio>
    <audio muted autoplay src="audio/胜利2.mp3"></audio>
    <audio autoplay loop class="BGAudio"></audio>
    <audio autoplay class="heroAudio"></audio>

    <script>
        const html = document.documentElement;
        const body = document.body;
        const box = document.querySelector('.box');
        let allGoods = document.querySelectorAll('.goods');
        const selectLevel = document.querySelector('.selectLevel');
        const disorganize = document.querySelector('.disorganize');
        const reset = document.querySelector('.reset');
        const BGAudio = document.querySelector('.BGAudio');
        const audio = document.querySelector('.audio');
        const recall = document.querySelector('.recall');
        const surplus = document.querySelector('.surplus');
        const levelBox = document.querySelector('.levelBox');
        const levelBoxDiv = document.querySelector('.levelBox>div');
        const levelBoxBtn = document.querySelectorAll('.levelBox>div button');
        const chronoscope = document.querySelector('.chronoscope');
        const heroAudio = document.querySelector('.heroAudio');
        const heroEmpty = document.querySelector('.heroEmpty');
        let boxGoodsLeft = 0;
        let boxVolume = 0;
        let spacing = 65;
        let disorganizeNum = 3;
        let recallNum = 3;
        let chronoscopeNum = 0;

        const goodsList = [
            '阿骨朵','艾琳','嫦娥','大师','暃','伽罗','戈雅','金蝉','镜','凯',
            '澜','李信','马超','蒙恬','蒙犽','盘古','桑启','沈梦溪','司空震','司马懿',
            '孙策','婉儿','西施','夏洛特','瑶','曜','元歌','云樱','云中君','猪八戒',
        ]

        function randomNum(min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
            const equipment = document.querySelector('.equipment');
            equipment.setAttribute('href', 'css/mobile.css');
            spacing = 48;
        }

        function createGoods(oneGoods) {
            const goods = document.createElement('div');
            goods.classList.add('goods');
            goods.style.backgroundImage = `url(king/${oneGoods}.webp)`;
            goods.setAttribute('mark', oneGoods);
            goods.style.top = randomNum(222, window.innerHeight - 333) + 'px';
            goods.style.left = randomNum(20, window.innerWidth - 70) + 'px';
            body.appendChild(goods);
            goods.setAttribute('onclick', 'goodsClick(this)');
        }

        function goodsClick(self) {
            if (boxVolume >= 7) return;
            createdAudio('king/click.mp3');
            const newGoods = self.cloneNode();
            newGoods.style.top = 0;
            newGoods.style.left = boxGoodsLeft + 'px';
            newGoods.style.padding = 0;
            newGoods.removeAttribute('onclick');
            boxGoodsLeft += spacing;
            boxVolume++;
            newGoods.style.opacity = 0;
            box.appendChild(newGoods);
            self.style.transition = 'top .4s, left .4s';
            self.style.padding = 0;
            self.style.top = box.offsetTop + 2 + 'px';
            self.style.left = boxGoodsLeft + box.offsetLeft - self.offsetWidth + 'px';
            setTimeout(() => {
                newGoods.style.opacity = 1;
                self.remove();
            }, 400);
            let count = 0;
            let children = [...box.children];
            children.forEach(item => item.getAttribute('mark') == newGoods.getAttribute('mark') && count++);
            let deleteNum = 3;
            if (count >= 3) {
                createdAudio('audio/得分.mp3');
                emptying(self);
                surplus.innerText = allGoods.length - 3;
                boxVolume -= 3;
                children.forEach(item => {
                    if (item.getAttribute('mark') == newGoods.getAttribute('mark') && deleteNum > 0) {
                        deleteNum--;
                        item.style.animation = 'fade .3s linear';
                        setTimeout(() => {
                            item.remove();
                            children = [...box.children];
                            boxGoodsLeft = spacing * children.length;
                            children.forEach((item, index) => {
                                item.style.transition = 'left .2s';
                                item.style.left = index * spacing + 'px';
                            });
                        }, 200);
                    }
                });
            }
            boxVolume >= 7 && gameFinish('很遗憾你输了', 'audio/失败.mp3');
            setTimeout(() => {
                allGoods = document.querySelectorAll('.goods');
                if (allGoods.length <= 0) {
                    gameFinish(`恭喜你通过了${selectLevel.innerText}\n用时${chronoscopeNum}秒`, 'audio/胜利2.mp3');
                    const levelRecord = JSON.parse(localStorage.getItem('king_level_record'));
                    levelRecord[selectLevel.getAttribute('index')]++;
                    localStorage.setItem('king_level_record', JSON.stringify(levelRecord));
                }
            }, 450);
        }

        function emptying(hero) {
            const arr = [...document.querySelectorAll('.goods')].filter(item => item.getAttribute('onclick'))
            let num = 0;
            arr.forEach(item => {
                if(item.getAttribute('mark') == hero.getAttribute('mark')) return num++;
            });
            if(num < 3) {
                heroAudio.setAttribute('src', `king/${hero.getAttribute('mark')}.mp3`);
                heroAudio.play();
                heroEmpty.style.display = 'block';
                heroEmpty.innerText = hero.getAttribute('mark') + '已清空';
                setTimeout(() => heroEmpty.style.display = 'none', 1000);
            }
        }

        function gameFinish(str, audio) {
            setTimeout(() => {
                alert(str);
                selectLevel.click();
            }, 200);
            surplus.innerText = allGoods.length;
            createdAudio(audio);
            disorganizeNum = 0;
            recallNum = 0;
        }

        function gameStart(number) {
            boxVolume = 0;
            boxGoodsLeft = 0;
            allGoods = document.querySelectorAll('.goods');
            allGoods.forEach(item => item.remove());
            disorganizeNum = 3;
            disorganize.innerText = `打乱 ${disorganizeNum}`;
            recallNum = 3;
            recall.innerText = `撤回 ${recallNum}`;
            chronoscopeNum = 0;
            chronoscope.innerText = chronoscopeNum;
            for (let i = 0; i < number; i++) {
                const num = randomNum(0, goodsList.length - 1);
                for (let i = 0; i < 3; i++) createGoods(goodsList[num]);
            }
            allGoods = document.querySelectorAll('.goods');
            allGoods.forEach(item => item.style.animation = `enter .3s`);
            surplus.innerText = allGoods.length;
        }

        disorganize.addEventListener('click', () => {
            if (disorganizeNum <= 0) return;
            disorganizeNum--;
            disorganize.innerText = `打乱 ${disorganizeNum}`;
            allGoods.forEach(item => {
                if (!item.getAttribute('onclick')) return;
                item.style.transition = 'top .4s, left .7s';
                item.style.top = randomNum(222, window.innerHeight - 333) + 'px';
                item.style.left = randomNum(20, window.innerWidth - 70) + 'px';
            });
        });
        disorganize.innerText = `打乱 ${disorganizeNum}`;

        reset.addEventListener('click', () => gameStart(selectLevel.getAttribute('level')));

        function createdAudio(src) {
            const audio = document.createElement('audio');
            document.body.appendChild(audio);
            audio.autoplay = true;
            audio.setAttribute('src', src);
            audio.play();
            audio.addEventListener('ended', e => e.target.remove());
        }

        audio.addEventListener('click', () => {
            if (BGAudio.getAttribute('src')) BGAudio.setAttribute('src', '');
            else BGAudio.setAttribute('src', 'king/BGM2.mp3');
            BGAudio.play();
        });

        recall.addEventListener('click', () => {
            let len = box.children.length;
            if (len <= 0 || recallNum <= 0) return;
            recallNum--;
            recall.innerText = `撤回 ${recallNum}`;
            let lastChild = box.children[len - 1];
            const newGoods = lastChild.cloneNode();
            newGoods.style.padding = '22px';
            newGoods.style.top = randomNum(222, window.innerHeight - 333) + 'px';
            newGoods.style.left = randomNum(20, window.innerWidth - 70) + 'px';
            newGoods.setAttribute('onclick', 'goodsClick(this)');
            body.appendChild(newGoods);
            boxGoodsLeft -= spacing;
            boxVolume--;
            lastChild.remove();
        });
        recall.innerText = `撤回 ${recallNum}`;

        selectLevel.addEventListener('click', () => {
            levelBox.style.display = 'block';
            const levelRecord = JSON.parse(localStorage.getItem('king_level_record'));
            levelRecord.forEach((item, index) => item && levelBoxBtn[index].classList.add('win'));
        });

        levelBoxDiv.addEventListener('click', () => levelBox.style.display = 'none');

        levelBoxBtn.forEach(item => {
            item.addEventListener('click', e => {
                const level = e.target.getAttribute('level');
                gameStart(level);
                selectLevel.setAttribute('level', level);
                selectLevel.setAttribute('index', e.target.getAttribute('index'));
                selectLevel.innerText = e.target.innerText;
            });
        });

        const levelRecord = new Array(levelBoxBtn.length);
        for (let i = 0; i < levelRecord.length; i++) levelRecord[i] = 0;
        localStorage.getItem('king_level_record') || localStorage.setItem('king_level_record', JSON.stringify(levelRecord));

        setInterval(() => chronoscope.innerText = ++chronoscopeNum, 1000);

        gameStart(selectLevel.getAttribute('level'));


        // cheating
        let pressTime = 0;
        levelBoxDiv.addEventListener('touchstart', () => pressTime = +new Date());
        levelBoxDiv.addEventListener('touchend', () => {
            pressTime = +new Date() - pressTime;
            if (pressTime > 3000) disorganizeNum = 9;
        });
    </script>
</body>

</html>
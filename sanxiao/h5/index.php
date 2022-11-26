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
            user-select: none;
        }

        .reset {
            width: 75px;
        }

        .controlBGM {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: transparent;
            border: none;
        }

        .surplus {
            position: fixed;
            top: 15px;
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
            bottom: 100px;
            left: 0;
            display: flex;
            justify-content: center;
        }

        .operate button {
            width: 55px;
            height: 40px;
            background-color: #ffffff;
            border-radius: 3px;
            font-size: 14px;
            color: rgb(66, 144, 255);
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
            z-index: 999;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
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
            top: 60px;
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
            top: 70px;
            left: 23px;
            border: 2px solid var(--top-text-color);
            background-color: transparent;
            font-weight: 800;
        }

        button:focus {
            outline: none;
        }

        .box {
            border-color: rgb(99, 164, 255);
            bottom: 25px;
        }

        .goods {
            padding: 23px;
            filter: grayscale(6%);
        }

        .goods.grey {
            filter: grayscale(100%);
        }

        .hrefSheep {
            position: fixed;
            top: 100px;
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
    <button class="controlBGM"></button>
    <div class="surplus"></div>
    <div class="chronoscope">0</div>
    <button class="updataPage" onclick="javascript:location.reload();">更新</button>
    <a href="king.php" class="hrefSheep">王了个王</a>
	<a href="&#104;&#116;&#116;&#112;&#115;&#58;&#47;&#47;&#100;&#116;&#109;&#98;&#119;&#46;&#99;&#111;&#109;&#47;&#37;&#101;&#57;&#37;&#97;&#98;&#37;&#57;&#56;&#37;&#101;&#54;&#37;&#56;&#51;&#37;&#56;&#53;&#37;&#101;&#53;&#37;&#57;&#53;&#37;&#56;&#54;&#37;&#101;&#53;&#37;&#97;&#101;&#37;&#57;&#100;&#37;&#101;&#53;&#37;&#56;&#53;&#37;&#98;&#56;" class="&#104;&#114;&#101;&#102;&#83;&#104;&#101;&#101;&#112;&#115;">&#25769;&#22969;&#25216;&#24039;</a>

    <div class="operate">
        <button class="disorganize">洗牌</button>
        <button class="recall">撤回</button>
        <button class="lightUp">点亮</button>
        <button class="selectLevel" level="5" index="0">第一关</button>
        <button class="reset">重置</button>
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

    <script>
        const html = document.documentElement;
        const body = document.body;
        const box = document.querySelector('.box');
        let allGoods = document.querySelectorAll('.goods');
        const selectLevel = document.querySelector('.selectLevel');
        const disorganize = document.querySelector('.disorganize');
        const reset = document.querySelector('.reset');
        const BGAudio = document.querySelector('.BGAudio');
        const controlBGM = document.querySelector('.controlBGM');
        const recall = document.querySelector('.recall');
        const surplus = document.querySelector('.surplus');
        const levelBox = document.querySelector('.levelBox');
        const levelBoxDiv = document.querySelector('.levelBox>div');
        const levelBoxBtn = document.querySelectorAll('.levelBox>div button');
        const chronoscope = document.querySelector('.chronoscope');
        const lightUp = document.querySelector('.lightUp');
        let boxGoodsLeft = 0;
        let boxVolume = 0;
        let spacing = 65;
        let disorganizeNum = 3;
        let recallNum = 3;
        let chronoscopeNum = 0;
        let range = 350;
        let lightUpNum = 3;
        const mutedSVG = '',
              notMutedSVG = '';
        const goodsList = [
            'zoon1', 'zoon2', 'zoon3', 'zoon4', 'zoon5', 'zoon6', 'zoon7', 'zoon8',
            'fruit1', 'fruit2', 'fruit3', 'fruit4', 'fruit5', 'fruit6', 'fruit7', 'fruit8',
            'cake1', 'cake2', 'cake3', 'cake4', 'cake5', 'cake6', 'cake7', 'cake8',
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
            range = 0;
        }

        function createGoods(oneGoods) {
            const goods = document.createElement('div');
            goods.classList.add('goods');
            goods.style.backgroundImage = `url(imgs/${oneGoods}.png)`;
            goods.setAttribute('mark', oneGoods)
            goods.style.top = randomNum(155, window.innerHeight - 222) + 'px';
            goods.style.left = randomNum(20 + range, window.innerWidth - 70 - range) + 'px';
            body.appendChild(goods);
            goods.setAttribute('onclick', 'goodsClick(this)');
        }

        function goodsClick(self) {
            if (boxVolume >= 7 || self.classList.contains('grey')) return;
            createdAudio('audio/点击.mp3');
            const newGoods = self.cloneNode();
            newGoods.style.top = 0;
            newGoods.style.left = boxGoodsLeft + 'px';
            newGoods.style.padding = 0;
            newGoods.removeAttribute('onclick');
            boxGoodsLeft += spacing;
            boxVolume++;
            newGoods.style.opacity = 0;
            box.appendChild(newGoods);
            self.style.transition = 'top .2s, left .2s';
            self.style.padding = 0;
            self.style.top = box.offsetTop + 2 + 'px';
            self.style.left = boxGoodsLeft + box.offsetLeft - self.offsetWidth + 'px';
            setTimeout(() => {
                newGoods.style.opacity = 1;
                self.remove();
                coverGoods();
            }, 100);
            let count = 0;
            let children = [...box.children];
            children.forEach(item => item.getAttribute('mark') == newGoods.getAttribute('mark') && count++);
            let deleteNum = 3;
            if (count >= 3) {
                createdAudio('audio/得分.mp3');
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
                    const levelRecord = JSON.parse(localStorage.getItem('sheep_level_record'));
                    levelRecord[selectLevel.getAttribute('index')]++;
                    localStorage.setItem('sheep_level_record', JSON.stringify(levelRecord));
                }
            }, 300);
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
            lightUpNum = 0;
        }

        function gameStart(number) {
            boxVolume = 0;
            boxGoodsLeft = 0;
            allGoods = document.querySelectorAll('.goods');
            allGoods.forEach(item => item.remove());
            disorganizeNum = 3;
            disorganize.innerText = `洗牌 ${disorganizeNum}`;
            recallNum = 3;
            recall.innerText = `撤回 ${recallNum}`;
            lightUpNum = 3;
            lightUp.innerText = `点亮 ${lightUpNum}`;
            chronoscopeNum = 0;
            chronoscope.innerText = chronoscopeNum;
            for (let i = 0; i < number; i++) {
                const num = randomNum(0, goodsList.length - 1);
                for (let i = 0; i < 3; i++) createGoods(goodsList[num]);
            }
            allGoods = document.querySelectorAll('.goods');
            allGoods.forEach((item, index) => {
                item.style.animation = `enter .3s`;
                item.style.zIndex = index + 1;
            });
            surplus.innerText = allGoods.length;
            setTimeout(coverGoods, 300);
        }

        disorganize.addEventListener('click', () => {
            if (disorganizeNum <= 0) return;
            disorganizeNum--;
            disorganize.innerText = `洗牌 ${disorganizeNum}`;
            allGoods.forEach(item => {
                if (!item.getAttribute('onclick')) return;
                item.style.transition = 'top .25s, left .25s';
                item.style.top = randomNum(155, window.innerHeight - 222) + 'px';
                item.style.left = randomNum(20 + range, window.innerWidth - 70 - range) + 'px';
            });
            setTimeout(coverGoods, 300);
        });
        disorganize.innerText = `洗牌 ${disorganizeNum}`;

        reset.addEventListener('click', () => gameStart(selectLevel.getAttribute('level')));

        function createdAudio(src) {
            const audio = document.createElement('audio');
            document.body.appendChild(audio);
            audio.autoplay = true;
            audio.setAttribute('src', src);
            audio.play();
            audio.addEventListener('ended', e => e.target.remove());
        }

        controlBGM.addEventListener('click', () => {
            if (BGAudio.getAttribute('src')) {
                BGAudio.setAttribute('src', '');
                controlBGM.innerHTML = mutedSVG;
            } else {
                BGAudio.setAttribute('src', 'audio/BGM1.mp3');
                controlBGM.innerHTML = notMutedSVG;
            }
            BGAudio.play();
        });
        controlBGM.innerHTML = mutedSVG;

        recall.addEventListener('click', () => {
            let len = box.children.length;
            if (len <= 0 || recallNum <= 0) return;
            recallNum--;
            recall.innerText = `撤回 ${recallNum}`;
            let lastChild = box.children[len - 1];
            const newGoods = lastChild.cloneNode();
            newGoods.style.padding = '23px';
            newGoods.style.top = randomNum(155, window.innerHeight - 222) + 'px';
            newGoods.style.left = randomNum(20 + range, window.innerWidth - 70 - range) + 'px';
            newGoods.setAttribute('onclick', 'goodsClick(this)');
            body.appendChild(newGoods);
            boxGoodsLeft -= spacing;
            boxVolume--;
            lastChild.remove();
        });
        recall.innerText = `撤回 ${recallNum}`;

        selectLevel.addEventListener('click', () => {
            levelBox.style.display = 'block';
            const levelRecord = JSON.parse(localStorage.getItem('sheep_level_record'));
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
        localStorage.getItem('sheep_level_record') || localStorage.setItem('sheep_level_record', JSON.stringify(levelRecord));

        setInterval(() => chronoscope.innerText = ++chronoscopeNum, 1000);

        function isIntersect(element1, element2) {
            const rect1 = element1.getBoundingClientRect();
            const rect2 = element2.getBoundingClientRect();
            return !(rect1.right - 5 < rect2.left || rect1.left > rect2.right - 5 || rect1.bottom - 5 < rect2.top || rect1.top > rect2.bottom - 5);
        }

        function coverGoods() {
            allGoods.forEach(item => item.classList.remove('grey'));
            for (let i = 0; i < allGoods.length; i++) {
                for (let j = i + 1; j < allGoods.length; j++) {
                    if(isIntersect(allGoods[i], allGoods[j]) && allGoods[i] != allGoods[j]) {
                        if(parseInt(allGoods[i].style.zIndex) > parseInt(allGoods[j].style.zIndex)) {
                            allGoods[j].classList.add('grey');
                        } else {
                            allGoods[i].classList.add('grey');
                        }
                    }
                }
            }
        }

        lightUp.addEventListener('click', () => {
            if (lightUpNum <= 0) return;
            allGoods.forEach(item => item.classList.remove('grey'));
            lightUpNum--;
            lightUp.innerText = `点亮 ${lightUpNum}`;
        });

        lightUp.innerText = `点亮 ${lightUpNum}`;

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
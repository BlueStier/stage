<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://localhost/stage/assets/cms/bower_components/bootstrap/dist/css/bootstrap.min.css">
<style>

img {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 50px;
}
</style>
</head>
<body>
<div class="container">
<h2>Demo</h2><section id="demo"><article><div class="row"><img id="text" src="http://localhost/stage/assets\site\img\about\Lighthouse.jpg" alt="Paris"><h1>Artisanal Narwahls</h1><br><p>From this distant vantage point, the Earth might not seem of any particular interest. But for us, it's different. Consider again that dot. That's here. That's home. That's us. On it everyone you love, everyone you know, everyone you ever heard of, every human being who ever was, lived out their lives. The aggregate of our joy and suffering, thousands of confident religions, ideologies, and economic doctrines, every hunter and forager, every hero and coward, every creator and destroyer of civilization, every king and peasant, every young couple in love, every mother and father, hopeful child, inventor and explorer, every teacher of morals, every corrupt politician, every "superstar," every "supreme leader," every saint and sinner in the history of our species lived there – on a mote of dust suspended in a sunbeam.</p><p>Space, the final frontier. These are the voyages of the starship Enterprise. Its five year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before!</p><p>Here's how it is: Earth got used up, so we terraformed a whole new galaxy of Earths, some rich and flush with the new technologies, some not so much. Central Planets, them was formed the Alliance, waged war to bring everyone under their rule; a few idiots tried to fight it, among them myself. I'm Malcolm Reynolds, captain of Serenity. Got a good crew: fighters, pilot, mechanic. We even picked up a preacher, and a bona fide companion. There's a doctor, too, took his genius sister out of some Alliance camp, so they're keeping a low profile. You got a job, we can do it, don't much care what it is.</p><p>Space, the final frontier. These are the voyages of the starship Enterprise. Its five year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before!</p></div></article><article><h1>Portland Leggings</h1><p>Here's how it is: Earth got used up, so we terraformed a whole new galaxy of Earths, some rich and flush with the new technologies, some not so much. Central Planets, them was formed the Alliance, waged war to bring everyone under their rule; a few idiots tried to fight it, among them myself. I'm Malcolm Reynolds, captain of Serenity. Got a good crew: fighters, pilot, mechanic. We even picked up a preacher, and a bona fide companion. There's a doctor, too, took his genius sister out of some Alliance camp, so they're keeping a low profile. You got a job, we can do it, don't much care what it is.</p><p>I am Duncan Macleod, born 400 years ago in the Highlands of Scotland. I am Immortal, and I am not alone. For centuries, we have waited for the time of the Gathering when the stroke of a sword and the fall of a head will release the power of the Quickening. In the end, there can be only one.</p><p>From this distant vantage point, the Earth might not seem of any particular interest. But for us, it's different. Consider again that dot. That's here. That's home. That's us. On it everyone you love, everyone you know, everyone you ever heard of, every human being who ever was, lived out their lives. The aggregate of our joy and suffering, thousands of confident religions, ideologies, and economic doctrines, every hunter and forager, every hero and coward, every creator and destroyer of civilization, every king and peasant, every young couple in love, every mother and father, hopeful child, inventor and explorer, every teacher of morals, every corrupt politician, every "superstar," every "supreme leader," every saint and sinner in the history of our species lived there – on a mote of dust suspended in a sunbeam.</p><p>Space, the final frontier. These are the voyages of the starship Enterprise. Its five year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before!</p></article>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="http://localhost/stage/assets/site/readmore.js/readmore.min.js"></script>
<script>
document.getElementById("text").style.width ='100px';
$('article').readmore({speed : 1000, moreLink: '<a href="#" onclick="expand(true)">En savoir plus</a>',lessLink: '<a href="#" onclick="expand(false)">Réduire</a>', collapsedHeight: 100});

function expand(sens){
    (sens ? document.getElementById("text").style.width ='800px' : document.getElementById("text").style.width ='50px');    
}
</script>
</body>
</html>
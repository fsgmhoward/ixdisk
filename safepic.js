function safepic()
{
if (document.getElementById('safepic').width==140)
{
document.getElementById('safepic').width=70;
document.getElementById('safepic').height=25;
document.getElementById('pictext').title="点击放大图片";
document.getElementById('pictext').innerHTML="点击放大图片";
}
else
{
document.getElementById('safepic').width=140;
document.getElementById('safepic').height=50;
document.getElementById('pictext').title="点击缩小图片";
document.getElementById('pictext').innerHTML="点击缩小图片";
}
}
function reload_safepic()
{
document.getElementById('safepic').src="./createsc.php?"+Math.random();
}
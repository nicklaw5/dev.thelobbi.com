var vid = document.getElementsByTagName("video");
[].forEach.call(vid, function (item) {
    item.addEventListener('mouseover', playVideo, false);
    item.addEventListener('mouseout', pauseVideo, false);
});

function playVideo(e)
{   
    this.play();
}
function pauseVideo(e)
{
    this.pause();
    this.style.background.display = "";
}
// footer google translate embed
function loadGoogleTranslate() {
  new google.translate.TranslateElement({ pageLanguage: 'en' }, 'lang');

  var $googleDiv = $('#lang .skiptranslate');
  var $googleDivChild = $('#lang .skiptranslate div');
  $googleDivChild.next().remove();

  $googleDiv
    .contents()
    .filter(function () {
      return this.nodeType === 3 && $.trim(this.nodeValue) !== '';
    })
    .remove();
}


// custom youtube thumbnail for video article
const YOUTUBE_IMG_URL = "https://i.ytimg.com/vi"

function init() {
  const videoElWrappers = document
    .querySelectorAll(".youtube")
    .forEach(createYoutubeEmbedPlayer)
  createStlyeBlock()
}
init()

function createYoutubeEmbedPlayer(element) {
  // get image
  const imgSrc = element.getAttribute("src") ?? getDefaultImageSrc(element)
  const imgEl = document.createElement("img")
  imgEl.src = imgSrc
  imgEl.classList.add("thumb")
  element.appendChild(imgEl)

  // create play button
  const playEl = document.createElement("div")
  playEl.classList.add("play")
  element.appendChild(playEl)

  // on click create iframe
  element.addEventListener("click", replaceInnerWithIframe)
}

function getDefaultImageSrc(element) {
  return `${YOUTUBE_IMG_URL}/${element.getAttribute("id")}/hqdefault.jpg`
}

function createStlyeBlock() {
  const styleEl = document.createElement("style")
  const styles = `
    .youtube {
      background-color: #000;
      max-width: 100%;
      overflow: hidden;
      position: relative;
      cursor: hand;
      cursor: pointer;
    }
    .youtube .thumb {
      bottom: 0;
      display: block;
      left: 0;
      margin: auto;
      max-width: 100%;
      position: absolute;
      right: 0;
      top: 0;
      width: 100%;
      height: auto;
    }
    .youtube .play {
      filter: alpha(opacity=80);
      opacity: 0.8;
      height: 77px;
      width: 77px;
      left: 50%;
      margin-left: -38px;
      margin-top: -38px;
      position: absolute;
      top: 50%;
      background: url("https://lh3.ggpht.com/vo4W82YNfpJDsttqn-22YsLtEJjmOtIB-54yIxR5wQA0Ucs5leNIu-W8iEmyY8-Pf7RWHk4=w64")
      no-repeat;
    }
    .youtube .youtube-iframe{
      position:absolute;
      top:0;
      left:0;
      width:100%;
      height:100%;
    }
  `
  styleEl.innerHTML = styles
  document.head.appendChild(styleEl)
}

function replaceInnerWithIframe(event) {
  const element = event.currentTarget
  const iframeEl = document.createElement("iframe")
  iframeEl.src = `https://www.youtube.com/embed/${element.getAttribute(
    "videoSource"
  )}?${getParams(element)}`

  iframeEl.classList.add("youtube-iframe")

  element.innerHTML = ""
  element.appendChild(iframeEl)
  //iframeEl.onload = this.click();
}

function getParams(element) {
  return element.dataset.params ?? `autoplay=1`
}



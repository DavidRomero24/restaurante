<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>403 - Forbidden</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Nova+Mono" rel="stylesheet">
  <style>
    :root {
      --font-header: 'Nova Mono', monospace;
      --font-text: 'Open Sans', sans-serif;
      --color-theme: #F1EEDB;
      --color-bg: #282B24;

      --animation-sentence: 'You know you\'re supposed to leave, right?';
      --animation-duration: 40s;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      width: 100%;
      font-family: var(--font-text);
      color: var(--color-theme);
      background: var(--color-bg);
      overflow: hidden;
    }

    .container {
      text-align: center;
      margin: 1rem 0.5rem 0;
    }

    .container h1 {
      font-family: var(--font-header);
      font-size: calc(4rem + 2vw);
      text-transform: uppercase;
    }

    .container p {
      text-transform: uppercase;
      letter-spacing: 0.2rem;
      font-size: 2rem;
      margin: 1.5rem 0 3rem;
    }

    svg.keyhole {
      height: 82px;
      width: 82px;
      opacity: 0;
      visibility: hidden;
      animation: showKey 0.5s 0.5s paused ease-out forwards;
    }

    svg.key {
      height: 164px;
      width: 164px;
      position: absolute;
      opacity: 0;
      visibility: hidden;
      animation: showKey 0.5s 0.5s paused ease-out forwards;
    }

    .ghost {
      position: absolute;
      bottom: 5px;
      left: calc(50% - 100px);
      width: 200px;
      height: 200px;
      animation: hoverGhost calc(var(--animation-duration)/2) ease-in-out 2;
    }

    .ghost:before {
      content: var(--animation-sentence);
      color: var(--color-theme);
      border-radius: 50%;
      position: absolute;
      bottom: 100%;
      text-align: center;
      line-height: 2;
      padding: 1rem;
      visibility: hidden;
      opacity: 0;
      animation:
        showText calc(var(--animation-duration)/8) calc(var(--animation-duration)*3/16) ease-out forwards,
        showNewText calc(var(--animation-duration)/8) calc(var(--animation-duration)*27/40) ease-out forwards,
        showFinalText calc(var(--animation-duration)/8) var(--animation-duration) ease-out forwards;
    }

    @keyframes hoverGhost {
      25% {
        transform: translateX(20vw);
      }
      75% {
        transform: translateX(-20vw);
      }
    }

    @keyframes showKey {
      to {
        opacity: 1;
        visibility: visible;
      }
    }

    @keyframes showText {
      2% {
        opacity: 1;
        visibility: visible;
      }
      98% {
        opacity: 1;
        visibility: visible;
      }
      99% {
        --animation-sentence: 'You know you\'re supposed to leave, right?';
        opacity: 0;
        visibility: hidden;
      }
      100% {
        --animation-sentence: 'So much to do, so little time...';
      }
    }

    @keyframes showNewText {
      2% {
        --animation-sentence: 'So much to do, so little time...';
        opacity: 1;
        visibility: visible;
      }
      98% {
        opacity: 1;
        visibility: visible;
      }
      99% {
        --animation-sentence: 'So much to do, so little time...';
        opacity: 0;
        visibility: hidden;
      }
      100% {
        --animation-sentence: 'Okay, you seem to care about this. Here\'s a key just for you';
      }
    }

    @keyframes showFinalText {
      2% {
        opacity: 1;
        visibility: visible;
      }
      98% {
        opacity: 1;
        visibility: visible;
      }
      100% {
        opacity: 0;
        visibility: hidden;
      }
    }
    a {
      text-transform: uppercase;
      text-decoration: none;
      background: var(--block-background);
      color: var(--button-color);
      padding: 1rem 4rem;
      border-radius: 4rem;
      font-size: 0.875rem;
      letter-spacing: 0.05rem;
    }
  </style>
</head>
<body>
  <!-- include the svg assets later used in the project -->
  <svg style="display: none;">
    <symbol id="keyhole" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 26.458333 26.458334">
      <g transform="translate(0 -270.542)">
        <circle cx="13.229" cy="279.141" r="8.599" fill="#f1eedb" paint-order="stroke fill markers"/>
        <path d="M10.516 283.271h5.427c1.164 0 1.768.861 2.102 1.802l3.59 10.125c.334.94-.937 1.802-2.102 1.802H6.926c-1.165 0-2.437-.861-2.103-1.802l3.59-10.125c.334-.94.938-1.802 2.103-1.802z" fill="#f1eedb" paint-order="stroke fill markers"/>
        <circle r="6.06" cy="279.141" cx="13.229" fill="#282b24" paint-order="stroke fill markers"/>
        <path d="M11.502 283.76h3.455c.741 0 1.126.733 1.338 1.534l2.286 8.614c.213.8-.597 1.534-1.338 1.534H9.216c-.742 0-1.551-.733-1.339-1.534l2.286-8.614c.212-.8.597-1.534 1.339-1.534z" fill="#282b24" paint-order="stroke fill markers"/>
      </g>
    </symbol>
    <symbol id="key" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 26.458333 26.458334">
      <circle cx="13.229" cy="279.141" r="8.599" paint-order="stroke fill markers" transform="matrix(0 -.76923 .7499 0 -202.882 23.405)" fill="#f1eedb"/>
      <circle r="8.599" cy="279.141" cx="13.229" paint-order="stroke fill markers" transform="matrix(0 -.5887 .57392 0 -153.756 21.017)" fill="#282b24"/>
      <path fill="#f1eedb" paint-order="stroke fill markers" d="M12.03 12.13h14.428v2.2H12.03z"/>
      <path fill="#f1eedb" paint-order="stroke fill markers" d="M18.147 12.13h2.895v6.772h-2.895zM22.113 12.13h2.716v5.065h-2.716z"/>
    </symbol>
    <symbol id="ghost" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 26.458333 26.458334">
      <g transform="translate(0 -270.542)">
        <path d="M4.63 279.293c0-4.833 3.85-8.751 8.6-8.751 4.748 0 8.598 3.918 8.598 8.75H13.23zM4.725 279.293h16.914c.052 0 .19.043.19.096l-.095 14.329c0 .026-.011.05-.028.068a.093.093 0 0 1-.067.028c-.881 0-1.235-1.68-2.114-1.616-.995.072-1.12 2.082-2.114 2.154-.88.064-1.233-1.615-2.115-1.615-.881 0-1.233 1.615-2.114 1.615-.881 0-1.233-1.615-2.114-1.615-.882 0-1.236 1.68-2.115 1.616-.995-.072-1.12-2.082-2.115-2.154-.88-.064-1.233 1.616-2.114 1.616a.092.092 0 0 1-.067-.028.092.092 0 0 1-.028-.068L4.535 279.39c0-.052.043-.096.095-.096z" fill="#f1eedb" paint-order="stroke fill markers"/>
        <path d="M8.01 280.37a1.26 1.26 0 0 0 0 2.518 1.26 1.26 0 0 0 0-2.518zm10.437 0a1.26 1.26 0 0 0 0 2.518 1.26 1.26 0 0 0 0-2.518zm-9.59 3.87a1.167 1.167 0 0 0-.928 1.885 2.42 2.42 0 0 0 3.496.24 2.42 2.42 0 0 0 .24-.24 1.167 1.167 0 0 0-.929-1.885 1.167 1.167 0 0 0-.753.28c-.101.086-.183.183-.274.28-.09-.097-.173-.194-.273-.28a1.167 1.167 0 0 0-.579-.28zm8.165 0a1.167 1.167 0 0 0-.928 1.885 2.42 2.42 0 0 0 3.496.24 2.42 2.42 0 0 0 .24-.24 1.167 1.167 0 0 0-.929-1.885 1.167 1.167 0 0 0-.752.28c-.101.086-.183.183-.274.28-.09-.097-.172-.194-.273-.28a1.167 1.167 0 0 0-.579-.28z" fill="#282b24" paint-order="stroke fill markers"/>
      </g>
    </symbol>
  </svg>

  <div class="container">
    <h1>403</h1>
    <p>Forbidden</p>
  </div>

  <svg class="ghost">
    <use href="#ghost" />
  </svg>

  <svg class="keyhole">
    <use href="#keyhole" />
  </svg>

  <svg class="key">
    <use href="#key" />
  </svg>
  <div >
    <a href="home" style="">Back</a>
    </div>

  <script>
    window.onload = () => {
      const ghost = document.querySelector('svg.ghost');
      const keyhole = document.querySelector('svg.keyhole');
      const key = document.querySelector('svg.key');

      ghost.addEventListener('animationend', event => {
        if (event.animationName === 'hoverGhost') {
          ghost.style.animationPlayState = 'paused';
          keyhole.style.animationPlayState = 'running';
          key.style.animationPlayState = 'running';
        }
      });
    };
  </script>
</body>
</html>

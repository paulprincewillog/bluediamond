
<div id="loading_cover">
    <img src="_assets/logo/cover-logo.jpg" width="80" height="71.19" alt="Blue Diamond">
</div>

<style>

#loading_cover {
    padding-top: 15%;
    padding-left: 5%;
    text-align: center;
    background-color: black;
    position: fixed;
    top:0px;
    bottom: 0px;
    left: 0px;
    right: 0px;
    margin: auto;
    z-index: 5;
}

#loading_cover::before {
    content: '';
    display: inline-block;
    width: 150px;
    height: 150px;
    border: 3px solid rgba(84, 41, 160, 0.2);
    border-radius: 50%;
    border-top-color: rgba(84, 41, 160, 0.7);
    animation: spin 1s ease-in-out infinite;
    -webkit-animation: spin 1s ease-in-out infinite;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

#loading_cover img {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

@keyframes spin {
to { transform: translate(-50%, -50%) rotate(360deg); }
}
@-webkit-keyframes spin {
to { -webkit-transform: translate(-50%, -50%) rotate(360deg); }
}
</style>

                    <div class="video-wrap">
                    <video id="video" autoplay></video>
                </div>
                <div class="controller">
                    <button id="snap" class="booth-capture-button">Capture Image</button>
                </div>
                    <canvas id="canvas" width="300" height="300"></canvas>
                    <!-- <img id="photo" src="http://placekitten.com//300/300" alt="Captured Image"> -->
                    <form action="savecam.php" method="POST">
                            <input type="hidden" id="image" name="img">
                            <ul>
                                <li><label><img style="width: 100px;" onclick="merge(100,80,'./uploads/alphatest1.png')" src="uploads/alphatest1.png"></label></li>
                                <li><label><img style="width: 100px;" onclick="merge(40,80,'./uploads/alphatest2.png')" src="uploads/alphatest2.png"></label></li>
                                <li><label><img style="width: 100px;" onclick="merge(100,80,'./uploads/alphatest3.png')" src="uploads/alphatest3.png"></label></li>
                            </ul>
                            <button onclick="save()" id="submit" name="upload">SAVE</button>
                        </form>
                


                
        <script>

                        'use strict';
                            
                            const video = document.getElementById('video');
                            const canvas = document.getElementById('canvas');
                            const snap = document.getElementById('snap');
                            const erorrMsgElement = document.getElementById('span#ErrorMsg');

                            const constraints = {
                                audio: false,
                                video:{
                                    width: 300, height: 300
                                }
                            };
                            
                            // Access webcam
                            async function init(){
                                try{
                                    const stream = await navigator.mediaDevices.getUserMedia(constraints);
                                    handleSuccess(stream);
                                }
                                catch(e){
                                    erorrMsgElement.innerHTML = `navigator.getUserMedia.error:{$(e.toString())}`;
                                }
                            }

                            // success
                            function handleSuccess(stream){
                                window.stream = stream;
                                video.srcObject = stream;
                            }

                            // load init
                            init();
                            // Draw image
                            var context = canvas.getContext('2d');
                            snap.addEventListener("click",function(){
                                context.drawImage(video, 0, 0, 300, 300);
                                console.log(photo.value);
                            });

                            const photo = document.getElementById('image');

                            function merge(x, y, img)
                            {
                                var new_img = new Image();
                                new_img.onload = function () {
                                    context.drawImage(new_img, x, y, 300, 300);
                                }
                                new_img.src = img;
                            }

                            function save() {
                                photo.value = canvas.toDataURL();
                            }
        </script>
# Installing h264 & ffmpeg on raspberry pi 4 model B command list
<h2>Install h264</h2>
<ul>
  <li><code>cd ~</code></li>
  <li><code>git clone --depth 1 https://code.videolan.org/videolan/x264.git</code></li>
  <li><code>cd x264</code></li>
  <li><code>./configure --host=arm-unknown-linux-gnueabi --enable-static --disable-opencl</code></li>
  <li><code>make -j4</code></li>
  <li><code>sudo make install</code></li>
</ul>
<h2>Install ffmpeg</h2>
<ul>
  <li><code>cd ~</code></li>
  <li><code>git clone git://source.ffmpeg.org/ffmpeg --depth=1</code></li>
  <li><code>cd ffmpeg</code></li>
  <li><code>./configure --arch=armel --target-os=linux --enable-gpl --enable-libx264 --enable-nonfree</code></li>
  <li><code>make -j4</code></li>
  <li><code>sudo make install</code></li>
</ul>

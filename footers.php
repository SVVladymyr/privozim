<footer>
            <div class="row footer-color">
                <div class="col-sm-3 offset-1">
                    <div class="row text-white">
                        <p class="header-font">Контакты</p>
                    </div>
                    <div class="row footer-font">
                        <p>{{ this.contacts['office']['address'] }}</p>
                        <template v-for="phone in contacts['office']['phone']">
                            <div class="w-100"></div>
                            <p>{{ phone }}</p>
                        </template>
                    </div>
                </div>
                <div class="col-sm-3 offset-1">
                    <div class="row text-white">
                        <p class="header-font">Мессенджеры</p>
                    </div>
                    <div class="row">
                        <div class="col">
                            <img src="<?php bloginfo('template_directory'); ?>/image/whatsapp-black.png" class="img-fluid footer-img-padding-right" height="auto" width="35rem"/>
                            <img src="<?php bloginfo('template_directory'); ?>/image/telegram-black.png" class="img-fluid footer-img-padding-right" height="auto" width="35rem"/>
                            <img src="<?php bloginfo('template_directory'); ?>/image/viber-black.png" class="img-fluid" height="auto" width="35rem"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 offset-1">
                    <div class="row text-white">
                        <p class="header-font">Социальные сети</p>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a :href="contacts['facebook']">
                                <img src="<?php bloginfo('template_directory'); ?>/image/facebook-black.png" class="img-fluid footer-img-padding-right" height="auto" width="35rem"/>
                            </a>
                            <a :href="contacts['facebook']">
                                <img src="<?php bloginfo('template_directory'); ?>/image/vk-black.png" class="img-fluid footer-img-padding-right" height="auto" width="35rem"/>
                            </a>
                        </div>
                    </div>
                </div>
                <br>
            </div>
            <div class="row footer-color-bottom footer-font footer-top">
                <div class="col-sm-3 offset-1">
                    &copy
                    <script type="text/javascript">
                            document.write(new Date().getFullYear());
                    </script>
                    Privozim.com
                </div>
                <div class="col-sm-3 offset-1">
                    Все права защищены
                </div>
                <div class="col-sm-3 offset-1">
                    Разработка сайта <a href="http://itgeen.com?utm_source=nash_sait&utm_medium=referral&utm_campaign=privozim" target="_blank" rel="nofollow">ITДжинн</a>
                </div>
            </div>
        </footer>
    </div>

<?php wp_footer() ?>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'kiFsupXudi';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>

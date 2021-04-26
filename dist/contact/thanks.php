<?php
__get_element('header')
?>
<main>

    <section class="heading-cover">
        <div class="container">
            <h2 class="heading-title">
            送信完了
                <span>Send Complete</span>
            </h2>
        </div>
    </section>
    <section class="thanks">
        <div class="container">
            <div class="description">お問い合わせを受け付けました。<br>
                ご記入頂いた情報は無事送信されました。<br>
                確認のためお客様へ自動返信メールをお送りさせて頂きました。<br>
                お問い合わせ頂き、ありがとうございました。</div>
            <div class="go-home">
                <a href="<?php the_url("") ?>">TOPへ戻る</a>
            </div>
        </div>
    </section>

</main>

<?php
__get_element('footer')
?>
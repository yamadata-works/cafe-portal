<?php

test('トップページはカフェ一覧に移動する', function () {
    $response = $this->get('/');

    $response->assertRedirect('/cafes');
});

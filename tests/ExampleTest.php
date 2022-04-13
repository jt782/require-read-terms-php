<?php

use Seven82Media\RequireReadTerms\FormTerms;

it('can get content', function () {
    $formId = 'form-id';
    $terms = new FormTerms(
        $formId,
        '<p>terms go here</p>'
    );

    expect($terms)->toBeInstanceOf(FormTerms::class);
    expect($terms->getButton())->toContain('terms go here');
    expect($terms->getScriptCode())->toContain("new RequireReadTerms('{$formId}')");
});

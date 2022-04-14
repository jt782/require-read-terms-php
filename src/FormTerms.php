<?php

namespace Seven82Media\RequireReadTerms;

class FormTerms
{
    protected string $formId;
    protected string $terms;

    public function __construct(
        string $formId,
        string $terms
    ) {
        $this->formId = $formId;
        $this->terms = $terms;
    }

    public function getButton(): string
    {
        return <<<EOD
<button id="read-agree-terms-button" href="#required-terms">Read and Agree to Terms</button>
<div id="required-terms" style="display:none;">
    {$this->terms}
</div>
EOD;
    }

    public function displayButton(): void
    {
        echo $this->getButton();
    }

    public function getScriptCode(): string
    {
        $jsFile = __DIR__ . '../dist/require-read-terms.js';

        ob_start();

        echo <<<EOD
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
EOD;

        require_once($jsFile);

        echo <<<EOD
    var requireReadTerms = new RequireReadTerms('{$this->formId}')
</script>
EOD;

        return ob_get_clean();
    }

    public function loadScript(): void
    {
        echo $this->getScriptCode();
    }

    public function loadModalDisplayButton(): void
    {
        $this->displayButton();
        $this->loadScript();
    }
}

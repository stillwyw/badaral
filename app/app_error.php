<?php
class AppError extends ErrorHandler {
    function access()
    {
        $this->_outputMessage('Access');
    }
}


?>
<?php

function logException(string $className, string $methodName, string $message) {
      report(sprintf("\nTime:%s\nClass:%s\nMethod:%s\nMessage:%s\n", \Carbon\Carbon::now()->toDateTimeString(), __CLASS__, __METHOD__, $e->getMessage()));
}

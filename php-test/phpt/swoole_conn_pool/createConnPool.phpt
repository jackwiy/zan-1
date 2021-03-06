--TEST--
swoole_conn_pool: create conn pool

--SKIPIF--
<?php require  __DIR__ . "/../inc/skipif.inc"; ?>
--INI--
assert.active=1
assert.warning=1
assert.bail=0
assert.quiet_eval=0


--FILE--
<?php
require_once __DIR__ . "/../inc/zan.inc";

/**
 * Created by IntelliJ IDEA.
 * User: chuxiaofeng
 * Date: 17/5/22
 * Time: 下午5:51
 */

$tcp_pool = new \swoole_connpool(\swoole_connpool::SWOOLE_CONNPOOL_TCP);
$r = $tcp_pool->createConnPool(1, 1);
assert($r === false);


$tcp_pool = new \swoole_connpool(\swoole_connpool::SWOOLE_CONNPOOL_REDIS);
$r = $tcp_pool->createConnPool(1, 1);
assert($r === false);


$tcp_pool = new \swoole_connpool(\swoole_connpool::SWOOLE_CONNPOOL_MYSQL);
$r = $tcp_pool->createConnPool(1, 1);
assert($r === false);

swoole_timer_after(1, function() {
    swoole_event_exit();
    echo "SUCCESS";
});

?>

--EXPECT--
SUCCESS
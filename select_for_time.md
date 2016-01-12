SELECT
t1.playthrough_id,
   TIMESTAMPDIFF(SECOND, t1.created_at, t2.created_at) - t3.paused_time AS total_play_time_seconds,
   t1.created_at AS started_on,
   t2.created_at AS ended_on
FROM times t1
LEFT JOIN times t2 ON t1.playthrough_id = t2.playthrough_id
LEFT JOIN (SELECT
t1.playthrough_id,
SUM(TIMESTAMPDIFF(SECOND, t1.created_at, t2.created_at)) AS paused_time
FROM times t1
LEFT JOIN times t2 ON t1.playthrough_id = t2.playthrough_id AND t2.order - t1.order = 1
WHERE (t1.action = 'pause' OR t1.action = 'start') AND t2.action = 'continue') t3 ON t1.playthrough_id = t3.playthrough_id
WHERE t1.action = 'start' AND t2.action = 'finish';
scratch that, this handles games that haven't finished yet: SELECT
t1.playthrough_id,
   TIMESTAMPDIFF(SECOND, t1.created_at, IFNULL(t2.created_at, NOW())) - t3.paused_time AS total_play_time_seconds,
   t1.created_at AS started_on,
   t2.created_at AS ended_on
FROM times t1
LEFT JOIN times t2 ON t1.playthrough_id = t2.playthrough_id AND (t2.action = 'finish')
LEFT JOIN (SELECT
t1.playthrough_id,
SUM(TIMESTAMPDIFF(SECOND, t1.created_at, t2.created_at)) AS paused_time
FROM times t1
LEFT JOIN times t2 ON t1.playthrough_id = t2.playthrough_id AND t2.order - t1.order = 1
WHERE (t1.action = 'pause' OR t1.action = 'start') AND t2.action = 'continue') t3 ON t1.playthrough_id = t3.playthrough_id
WHERE t1.action = 'start';
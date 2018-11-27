FROM mysql:5.5

RUN apt update && apt install -y git curl
RUN git clone https://github.com/tpruvot/yiimp /tmp/yiimp

#RUN cp /tmp/yiimp/sql/2015-07-01-accounts_hostaddr.sql /docker-entrypoint-initdb.d/
#RUN cp /tmp/yiimp/sql/2015-07-12-yaamp.sql.gz /docker-entrypoint-initdb.d/
#RUN cp /tmp/yiimp/sql/2015-07-15-coins_hasmasternodes.sql /docker-entrypoint-initdb.d/
#RUN cp /tmp/yiimp/sql/2015-09-20-blocks_worker.sql /docker-entrypoint-initdb.d/
#RUN cp /tmp/yiimp/sql/2016-02-17-payouts_errmsg.sql /docker-entrypoint-initdb.d/
#RUN cp /tmp/yiimp/sql/2016-02-18-accounts_donation.sql /docker-entrypoint-initdb.d/
#RUN cp /tmp/yiimp/sql/2016-02-23-shares_diff.sql /docker-entrypoint-initdb.d/
#RUN cp /tmp/yiimp/sql/2016-03-26-markets.sql /docker-entrypoint-initdb.d/
#RUN cp /tmp/yiimp/sql/2016-03-30-coins.sql /docker-entrypoint-initdb.d/
#RUN cp /tmp/yiimp/sql/2016-04-03-accounts.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2016-04-03-yaamp.sql.gz /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2016-04-24-market_history.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2016-04-27-settings.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2016-05-11-coins.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2016-05-15-benchmarks.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2016-05-23-bookmarks.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2016-06-01-notifications.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2016-06-04-bench_chips.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2016-11-23-coins.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2017-02-05-benchmarks.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2017-03-31-earnings_index.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2017-05-accounts_case_swaptime.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2017-06-payouts_coinid_memo.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2017-09-notifications.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2017-10-bookmarks.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2017-11-segwit.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2018-01-stratums_ports.sql /docker-entrypoint-initdb.d/
RUN cp /tmp/yiimp/sql/2018-02-coins_getinfo.sql /docker-entrypoint-initdb.d/

# FIXME: db upgrade?

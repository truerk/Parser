<?php

/**
 * @author Truerk
 * Class Parser
 */
class Parser
{
    /**
     * @param $urls
     * @param bool $flowMode
     * @param int $flow
     * @return array|void
     */
    function multiCurl($urls, $flowMode = false, $flow = 1)
    {
        if ($flowMode) {
            return $this->multiCurlFlow($urls, $flow);
        }

        #Создаем mh
        $mh = curl_multi_init();

        #Создаем массив для ch
        $handles = [];

        foreach ($urls as $url){
            #Создаем ch
            $ch = curl_init($url);

            #Настраиваем ch
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            /*curl_setopt($ch, CURLOPT_PROXY, '93.170.123.77:1080');
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);*/

            curl_setopt($ch, CURLOPT_TIMEOUT, 100);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

            #Добавляем ch в mh
            curl_multi_add_handle($mh, $ch);

            #Добавляем ch в массив
            $handles[$url] = $ch;
        }

        do {
            #run mh
            $mrc = curl_multi_exec($mh, $active);
        } while ($mrc == CURLM_CALL_MULTI_PERFORM);

        #check result
        while ($active && $mrc == CURLM_OK) {
            if (curl_multi_select($mh) == -1) {
                usleep(100);
            }

            do{
                $mrc = curl_multi_exec($mh, $active);
            }while ($mrc == CURLM_CALL_MULTI_PERFORM);
        }

        foreach ($handles as $channel) {
            //получаем exec(ch)
            $html = curl_multi_getcontent($channel);

            $htmls[] = $html;

            //удаляем хандлы ch
            curl_multi_remove_handle($mh, $channel);
        }

        curl_multi_close($mh);

        return $htmls;
    }

    /**
     * @param $urls
     * @param $flow
     * @return array
     */
    private function multiCurlFlow($urls, $flow)
    {
        #Количество потоков
        $urls = array_chunk($urls, $flow);

        #Прогоняем потоки
        foreach ($urls as $chunk) {
            #Создаем mh
            $mh = curl_multi_init();

            #Создаем массив для ch
            $handles = [];

            foreach ($chunk as $url){
                #Создаем ch
                $ch = curl_init($url);

                #Настраиваем ch
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                /*curl_setopt($ch, CURLOPT_PROXY, '93.170.123.77:1080');
                curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);*/

                curl_setopt($ch, CURLOPT_TIMEOUT, 100);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

                #Добавляем ch в mh
                curl_multi_add_handle($mh, $ch);

                #Добавляем ch в массив
                $handles[$url] = $ch;
            }

            do {
                #run mh
                $mrc = curl_multi_exec($mh, $active);
            } while ($mrc == CURLM_CALL_MULTI_PERFORM);

            #check result
            while ($active && $mrc == CURLM_OK) {
                if (curl_multi_select($mh) == -1) {
                    usleep(100);
                }

                do{
                    $mrc = curl_multi_exec($mh, $active);
                }while ($mrc == CURLM_CALL_MULTI_PERFORM);
            }

            foreach ($handles as $channel) {
                //получаем exec(ch)
                $html = curl_multi_getcontent($channel);

                $htmls_flow[] = $html;

                //удаляем хандлы ch
                curl_multi_remove_handle($mh, $channel);
            }

            curl_multi_close($mh);


        }
        return $htmls_flow;
    }
}


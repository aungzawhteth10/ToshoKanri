<?php
namespace App\Api;
class ApiStaffFix extends ApiBase
{
    /*
     * 初期化
     */
    public function init ($request, $response)
    {
        $result = [
            'kihon' => [],
            'ichiran' => [],
        ];
       //スタッフ情報
       $dbStaffMapper = new \App\db\DbStaffMapper;
       $dmStaff = new \App\model\DmStaff;
       $dmStaff->staff_id  = $this->session->staff_id;
       $staff = $dbStaffMapper->find($dmStaff);
        if(count($staff) == 0){
            return parent::toJson($result);
        }
        //勤務区分一覧情報
        $dbKinmuKubunMapper = new \App\db\DbKinmuKubunMapper;
        $dmKinmuKubun = new \App\model\DmKinmuKubun;
        $dmKinmuKubun->staff_id   = $this->session->staff_id;
        $kinmuKubun = $dbKinmuKubunMapper->find($dmKinmuKubun); 
        $result['kihon'] = [
            'staff_id'               => $staff[0]['staff_id'], //スタッフID
            'staff_code'             => $staff[0]['staff_code'],   //利用者ID
            'name'                   => $staff[0]['name'], //氏名
            'furigana'               => $staff[0]['furigana'],    //フリガナ
            'hyouji_ryakushou'       => $staff[0]['hyouji_ryakushou'], //表示略称
            'seibetsu'               => $staff[0]['seibetsu'], //性別
            'seinengappi_gengou'     => $staff[0]['seinengappi_gengou'], //生年月日元号
            'seinengappi_year'       => $staff[0]['seinengappi_year'], //生年月日 年
            'seinengappi_month'      => $staff[0]['seinengappi_month'], //生年月日　月
            'seinengappi_day'        => $staff[0]['seinengappi_day'], //生年月日　日
            'age'                    => $staff[0]['age'], //年齢
            'post_no'                => $staff[0]['post_no'], //郵便番号
            'todoufuken'             => $staff[0]['todoufuken'], //都道府県
            'shikuchoson'            => $staff[0]['shikuchoson'], //市区町村
            'chou_name'              => $staff[0]['chou_name'], //町名
            'banchi'                 => $staff[0]['banchi'], //番地
            'tel_no'                 => $staff[0]['tel_no'],  //電話番号
            'moblie_no'              => $staff[0]['moblie_no'], //携帯番号
            'fax_no'                 => $staff[0]['fax_no'], //fax番号
            'mail_address'           => $staff[0]['mail_address'], //メールアドレス
            'bikou'                  => $staff[0]['bikou'], //備考
            'sakujo_day'             => $staff[0]['sakujo_day'], //削除日
            //緊急連絡先
            'kinkyuuji_name'         => $staff[0]['kinkyuuji_name'], //緊急氏名
            'kinkyuuji_post_on'      => $staff[0]['kinkyuuji_post_on'],//緊急郵便番号
            'kinkyuuji_todoufuken'   => $staff[0]['kinkyuuji_todoufuken'], //緊急都道府県
            'kinkyuuji_shikuchoson'  => $staff[0]['kinkyuuji_shikuchoson'], //緊急市区町村
            'kinkyuuji_chou_name'    => $staff[0]['kinkyuuji_chou_name'], //緊急町名
            'kinkyuuji_banchi'       => $staff[0]['kinkyuuji_banchi'], //緊急番地
            'kinkyuuji_tel_no'       => $staff[0]['kinkyuuji_tel_no'], //緊急電話番号
            'kinkyuuji_bikou'        => $staff[0]['kinkyuuji_bikou'],//緊急備考
            //勤務形態
            'nyusyaday_gengou'       => $staff[0]['nyusyaday_gengou'],     //入社日元号
            'nyusyaday_year'         => $staff[0]['nyusyaday_year'],       //入社日　年
            'nyusyaday_month'        => $staff[0]['nyusyaday_month'],      //入社日　月
            'nyusyaday_day'          => $staff[0]['nyusyaday_day'],        //入社日　日
            'kijunbi_henkou'         => $staff[0]['kijunbi_henkou'],       //有給休暇の基準日 変更
            'yuukyuukyuuka_gengou'   => $staff[0]['yuukyuukyuuka_gengou'], //有給休暇の基準日 元号
            'yuukyuukyuuka_year'     => $staff[0]['yuukyuukyuuka_year'],   //有給休暇の基準日 年
            'yuukyuukyuuka_month'    => $staff[0]['yuukyuukyuuka_month'],  //有給休暇の基準日 月
            'yuukyuukyuuka_day'      => $staff[0]['yuukyuukyuuka_day'],    //有給休暇の基準日 日
            'syubetu_bikou'          => $staff[0]['syubetu_bikou'],        //種別
            'keiyaku_nissuu'         => $staff[0]['keiyaku_nissuu'],       //契約日数
            'keiyaku_jikan'          => $staff[0]['keiyaku_jikan'],        //契約時間
            'kinmu_kubun'            => $staff[0]['kinmu_kubun'],          //勤務区分
            'kinmu_kibouchi'         => $staff[0]['kinmu_kibouchi'],       //勤務希望地
            'check_koutu_1'          => $staff[0]['check_koutu_1'],        //徒歩
            'check_koutu_2'          => $staff[0]['check_koutu_2'],        //自転車
            'check_koutu_3'          => $staff[0]['check_koutu_3'],        //オートバイ
            'check_koutu_4'          => $staff[0]['check_koutu_4'],        //自動車
            'check_koutu_5'          => $staff[0]['check_koutu_5'],        //電車・バス
            'check_koutu_6'          => $staff[0]['check_koutu_6'],        //その他    
            //振込口座情報
           // 'furikomisaki_bunkum'       => $staff[0]['furikomisaki_bunkum'], //振込先区分
        /*    'bank_bank_name_furi'       => $staff[0]['bank_bank_name_furi'],  //銀行名
            'bank_shiten_furigana'      => $staff[0]['bank_shiten_furigana'], //支店名
            'bank_bank_code'            => $staff[0]['bank_bank_code'],       //銀行コード
            'bank_shiten_code'          => $staff[0]['bank_shiten_code'],     //支店コード
            'bank_kouza_shubets'        => $staff[0]['bank_kouza_shubets'],  //口座種別
            'bank_kouza_no'             => $staff[0]['bank_kouza_no'],         //口座番号
            'bank_kouza_meigi_furigana' => $staff[0]['bank_kouza_meigi_furigana'], //口座名義フリガナ
            'bank_kokyaku_code'         => $staff[0]['bank_kokyaku_code'],      //顧客コード        */
        ];
        //勤務希望設定
        foreach ($kinmuKubun as $key => $value) {
            $result['ichiran'][] = [
                'id'                     => $value['youbi_id'],          //曜日
                'kinmu_kubun_id'         => $value['kinmu_kubun_id'],    //勤務区分
                'start_time_1'           => $value['start_time_1'],      //開始時間１
                'end_time_1'             => $value['end_time_1'],        //終了時間1
                'start_time_2'           => $value['start_time_2'],      //開始時間2
                'end_time_2'             => $value['end_time_2'],        //終了時間2
                'start_time_3'           => $value['start_time_3'],      //開始時間3
                'end_time_3'             => $value['end_time_3'],        //終了時間3
                'start_time_4'           => $value['start_time_4'],      //開始時間4
                'end_time_4'             => $value['end_time_4'],        //終了時間4
                'start_time_5'           => $value['start_time_5'],      //開始時間5
                'end_time_5'             => $value['end_time_5'],        //終了時間5 
                
            ];
        }
        return parent::toJson($result);
    }
    /*
     * スタッフ情報更新
     */
    public function update ($request, $response)
    {   
        $postData  = parent::getValues($request);
        $kihon = $postData['kihon']; 
        $dbStaffMapper = new \App\db\DbStaffMapper;
        $dmStaff = new \App\model\DmStaff;
        $dmStaff->staff_id              = $kihon['staff_id'];             //スタッフID
        $dmStaff->staff_code            = $kihon['staff_code'];           //スタッフコード
        $dmStaff->name                  = $kihon['name'];                 //氏名
        $dmStaff->furigana              = $kihon['furigana'];             //フリガナ
        $dmStaff->hyouji_ryakushou      = $kihon['hyouji_ryakushou'];     //表示略称
        $dmStaff->seibetsu              = $kihon['seibetsu'];             //性別
        $dmStaff->seinengappi_gengou    = $kihon['seinengappi_gengou'];   //生年月日　元号
        $dmStaff->seinengappi_year      = $kihon['seinengappi_year'];     //生年月日　年
        $dmStaff->seinengappi_month     = $kihon['seinengappi_month'];    //生年月日　月
        $dmStaff->seinengappi_day       = $kihon['seinengappi_day'];      //生年月日  日
        $dmStaff->age                   = $kihon['age'];                  //年齢
        $dmStaff->post_no               = $kihon['post_no'];              //郵便番号
        $dmStaff->todoufuken            = $kihon['todoufuken'];           //都道府県
        $dmStaff->shikuchoson           = $kihon['shikuchoson'];          //市区町村
        $dmStaff->chou_name             = $kihon['chou_name'];            //町名
        $dmStaff->banchi                = $kihon['banchi'];               //番地
        $dmStaff->tel_no                = $kihon['tel_no'];               //電話番号
        $dmStaff->moblie_no             = $kihon['moblie_no'];            //携帯番号 
        $dmStaff->fax_no                = $kihon['fax_no'];               //FAX番号
        $dmStaff->mail_address          = $kihon['mail_address'];         //メールアドレス
        $dmStaff->bikou                 = $kihon['bikou'];                //備考
        $dmStaff->sakujo_day            = $kihon['sakujo_day'];           //削除日
        //緊急連絡先
        $dmStaff->kinkyuuji_name        = $kihon['kinkyuuji_name'];        //緊急氏名
        $dmStaff->kinkyuuji_post_on     = $kihon['kinkyuuji_post_on'];     //緊急郵便番号
        $dmStaff->kinkyuuji_todoufuken  = $kihon['kinkyuuji_todoufuken'];  //緊急都道府県
        $dmStaff->kinkyuuji_shikuchoson = $kihon['kinkyuuji_shikuchoson']; //緊急市区町村
        $dmStaff->kinkyuuji_chou_name   = $kihon['kinkyuuji_chou_name'];   //緊急町名
        $dmStaff->kinkyuuji_banchi      = $kihon['kinkyuuji_banchi'];      //緊急番地
        $dmStaff->kinkyuuji_tel_no      = $kihon['kinkyuuji_tel_no'];      //緊急電話番号
        $dmStaff->kinkyuuji_bikou       = $kihon['kinkyuuji_bikou'];       //緊急備考
        //勤務形態
        $dmStaff->nyusyaday_gengou        = $kihon['nyusyaday_gengou'];        //入社日元号
        $dmStaff->nyusyaday_year          = $kihon['nyusyaday_year'];          //入社日　年
        $dmStaff->nyusyaday_month         = $kihon['nyusyaday_month'];         //入社日　月
        $dmStaff->nyusyaday_day           = $kihon['nyusyaday_day'];           //入社日　日
        $dmStaff->kijunbi_henkou          = $kihon['kijunbi_henkou'];          //有給休暇の基準日 変更
        $dmStaff->yuukyuukyuuka_gengou    = $kihon['yuukyuukyuuka_gengou'];    //有給休暇の基準日 元号
        $dmStaff->yuukyuukyuuka_year      = $kihon['yuukyuukyuuka_year'];      //有給休暇の基準日 年
        $dmStaff->yuukyuukyuuka_month     = $kihon['yuukyuukyuuka_month'];     //有給休暇の基準日 月
        $dmStaff->yuukyuukyuuka_day       = $kihon['yuukyuukyuuka_day'];       //有給休暇の基準日 日
        $dmStaff->syubetu_bikou           = $kihon['syubetu_bikou'];           //種別
        $dmStaff->keiyaku_nissuu          = $kihon['keiyaku_nissuu'];          //契約日数
        $dmStaff->keiyaku_jikan           = $kihon['keiyaku_jikan'];           //契約時間
        $dmStaff->kinmu_kubun             = $kihon['kinmu_kubun'];             //勤務区分
        $dmStaff->kinmu_kibouchi          = $kihon['kinmu_kibouchi'];          //勤務希望地
        $dmStaff->check_koutu_1           = $kihon['check_koutu_1'];           //徒歩
        $dmStaff->check_koutu_2           = $kihon['check_koutu_2'];           //自転車
        $dmStaff->check_koutu_3           = $kihon['check_koutu_3'];           //オートバイ
        $dmStaff->check_koutu_4           = $kihon['check_koutu_4'];           //自動車
        $dmStaff->check_koutu_5           = $kihon['check_koutu_5'];           //電車・バス
        $dmStaff->check_koutu_6           = $kihon['check_koutu_6'];           //その他
        //振込口座情報
      /*  $dmStaff->bank_bank_name_furi            = $kihon['bank_bank_name_furi'];      //銀行名
        $dmStaff->bank_shiten_furigana           = $kihon['bank_shiten_furigana'];       //支店名
        $dmStaff->bank_bank_code                 = $kihon['bank_bank_code'];             //銀行コード
        $dmStaff->bank_shiten_code               = $kihon['bank_shiten_code'];           //支店コード
        $dmStaff->bank_kouza_shubets             = $kihon['bank_kouza_shubets'];         //口座種別
        $dmStaff->bank_kouza_no                  = $kihon['bank_kouza_no'];              //口座番号
        $dmStaff->bank_kouza_meigi_furigana      = $kihon['bank_kouza_meigi_furigana'];  //口座名義フリガナ
        $dmStaff->bank_kokyaku_code              = $kihon['bank_kokyaku_code'];          //顧客コード*/
        $count = 0;
        //勤務区分一覧情報
        $dbKinmuKubunMapper = new \App\db\DbKinmuKubunMapper;
        $dmKinmuKubun = new \App\model\DmKinmuKubun;   
        $dmKinmuKubun->staff_id = $kihon['staff_id'];//スタッフID
        $count += $dbKinmuKubunMapper->delete($dmKinmuKubun);
       
        foreach ($postData['ichiran'] as $key => $value) {
            $dmKinmuKubun = new \App\model\DmKinmuKubun;   
            $dmKinmuKubun->staff_id          = $kihon['staff_id'];//スタッフID
            $dmKinmuKubun->youbi_id          = $value['id'];//曜日ID
            $dmKinmuKubun->kinmu_kubun_id    = $value['kinmu_kubun_id'];//勤務区分
            $dmKinmuKubun->start_time_1      = $value['start_time_1'];//開始時間1
            $dmKinmuKubun->end_time_1        = $value['end_time_1'];//終了時間1
            $dmKinmuKubun->start_time_2      = $value['start_time_2'];//開始時間2
            $dmKinmuKubun->end_time_2        = $value['end_time_2'];//終了時間2
            $dmKinmuKubun->start_time_3      = $value['start_time_3'];//開始時間3
            $dmKinmuKubun->end_time_3        = $value['end_time_3'];//終了時間3
            $dmKinmuKubun->start_time_4      = $value['start_time_4'];//開始時間4
            $dmKinmuKubun->end_time_4        = $value['end_time_4'];//終了時間4 
            $dmKinmuKubun->start_time_5      = $value['start_time_5'];//開始時間5
            $dmKinmuKubun->end_time_5        = $value['end_time_5'];//終了時間5
            $count += $dbKinmuKubunMapper->insert($dmKinmuKubun);
        }
        if ($this->session->staff_id == '') {
            $count += $dbStaffMapper->insert($dmStaff);
        } else {
            $count += $dbStaffMapper->update($dmStaff);
        }
        return parent::toJson($count);
    }
}
<?php

namespace App\Http\Controllers;

class XMLController extends Controller
{
    public function index(){

        $xmlstring = '
<Reply>
    <Header>
        <Method>cGetBetHistory</Method>
        <ErrorCode>0</ErrorCode>
        <MerchantID>1235</MerchantID>
        <MessageID>H110830134512K9n12</MessageID>
    </Header>
    <Param>
        <TotalRecord>1</TotalRecord>
        <ErrorDesc></ErrorDesc>
        <BetInfo>
            <No>2</No>
            <UserID>Player_1313455</UserID>
            <BetTime>08/15/2011 09:37:48</BetTime>
            <BalanceTime>08/15/2011 09:38:31</BalanceTime>
            <ProductID>Baccarat</ProductID>
            <GameInterface>3DView</GameInterface>
            <BetID>a2e3f40b-acae4c58aae8fbd4f755b694</BetID>
            <BetType>Single</BetType>
            <BetAmount>10000</BetAmount>
            <WinLoss>0</WinLoss>
            <BetResult>Loss</BetResult>
            <BetArrays>
                <Bet>
                    <GameID>98</GameID>
                    <SubBetType>Player</SubBetType>
                    <GameResult>P CLUB A DIAMOND A SPADE 9 ,B DIAMOND 3 CLUB 9 DIAMOND 6</GameResult>
                    <WinningBet>Banker</WinningBet>
                    <TableID>Baccarat_1</TableID>
                    <DealerID>6</DealerID>
                </Bet>
            </BetArrays>
        </BetInfo>
        <BetInfo>
            <No>3</No>
            <UserID>Player_1313455</UserID>
            <BetTime>08/15/2011 09:44:48</BetTime>
            <BalanceTime>08/15/2011 09:45:01</BalanceTime>
            <ProductID>Roulette</ProductID>
            <GameInterface></GameInterface>
            <BetID>86791c28-dbb2-4103-a7e8-f1c206bb417d</BetID>
            <BetType>Single</BetType>
            <BetAmount>100000</BetAmount>
            <WinLoss>0</WinLoss>
            <BetResult>Loss</BetResult>
            <BetArrays>
                <Bet>
                    <GameID>R11306251387</GameID>
                    <SubBetType>Red</SubBetType>
                    <GameResult>32</GameResult>
                    <WinningBet>32, Red, 19-36</WinningBet>
                    <TableID>Roulette 1</TableID>
                    <DealerID>6</DealerID>
                </Bet>
            </BetArrays>
        </BetInfo>
    </Param>
</Reply>
';
        /* convert XML to array */
        $array = json_decode(json_encode(simplexml_load_string($xmlstring)), true);

        /*
        Creating bet amounts array nested in BetInfo item.
        As item key I decided use BetID in case need to know which bet amount is
        */
        $prepared_bet_array = [];
        foreach($array['Param']['BetInfo'] as $item){
            if(isset($item['BetAmount'])){
                $prepared_bet_array[$item['BetID']] = $item['BetAmount'];
            }
        }

        /* calculate sum of bets */
        $total_bet_amount = array_sum($prepared_bet_array);

        //dump($prepared_bet_array);
        //dump($total_bet_amount);
        return view("XML.index", ["data" => $prepared_bet_array, "sum" => $total_bet_amount]);
    }
}

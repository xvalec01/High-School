unit Unit1;

interface

uses
  Winapi.Windows, Winapi.Messages, System.SysUtils, System.Variants, System.Classes, Vcl.Graphics,
  Vcl.Controls, Vcl.Forms, Vcl.Dialogs, Vcl.StdCtrls, Vcl.Buttons,
  Vcl.Imaging.pngimage, Vcl.ExtCtrls, Vcl.ComCtrls;

type
  TForm1 = class(TForm)
    Timer1: TTimer;
    Timer2: TTimer;
    �vodn�: TImage;
    Play: TImage;
    pozadi: TImage;
    skore: TLabel;
    Thebestscore: TLabel;
    cesticka: TImage;
    Character: TImage;
    StatusBar1: TStatusBar;
    prekazka: TImage;
    prekazka2: TImage;
    prekazka3: TImage;
    Timer3: TTimer;
    oblacek: TImage;
    warning: TLabel;
    procedure Timer1Timer(Sender: TObject);
    procedure FormActivate(Sender: TObject);
    procedure FormKeyPress(Sender: TObject; var Key: Char);
    procedure Timer2Timer(Sender: TObject);
    procedure PlayClick(Sender: TObject);
    procedure Timer3Timer(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  Form1: TForm1;
  nejscore,score:longint;
  zastavit:boolean;  //prom�nn� zastavit slou�� k zji��ov�n�, jestli se pan��ek p�i skoku u� dos�hnul ur�it� v��ky
                     //jednodu�e je tu, aby mohl charakter sk�kat
implementation

{$R *.dfm}


procedure TForm1.FormActivate(Sender: TObject);
begin
  score:=0;
  zastavit:=false;
  skore.Visible:=false;
  thebestscore.Visible:=false;
  pozadi.Visible:=false;
  cesticka.Visible:=false;
  character.Top:=239; character.Left:=384;
  prekazka.Visible:=false;
  prekazka2.Visible:=false;
  prekazka3.Visible:=false;
end;


procedure TForm1.FormKeyPress(Sender: TObject; var Key: Char);
begin
  if (key=' ') and (cesticka.Visible=true) then
  begin
    zastavit:=true;
    timer1.Enabled:=true;
    timer2.Enabled:=true;
    timer3.Enabled:=true;
    warning.Visible:=false;
  end;
  //Jestli�e stisknu mezern�k, spust� se timery, kter� vlastn� spou�t� celou hru.

end;

procedure TForm1.PlayClick(Sender: TObject);
begin
  �vodn�.Visible:=true;
  play.Visible:=false;
  skore.Visible:=true;
  thebestscore.Visible:=true;
  thebestscore.Left:=8; thebestscore.Top:=8;
  pozadi.Visible:=true;
  cesticka.Visible:=true;
  character.Top:=274; character.Left:=40;
  prekazka.Visible:=true;
  prekazka2.Visible:=true;
  prekazka3.Visible:=true;
  oblacek.Visible:=true;
  warning.Visible:=true;
end;


procedure TForm1.Timer1Timer(Sender: TObject);
begin

  if Character.Top=100 then  zastavit:=false;
  if zastavit=true then
    if Character.Top>100 then
    Character.Top:=Character.Top - 6;
  if zastavit=false then
    if Character.Top<274 then
    Character.Top:=Character.Top + 6;
  //Tyto podm�nky slou�� ke sk�k�n� postavi�ky, jestli�e dos�hne ur�it�ho bodu, vr�c� se dol�
  thebestscore.Caption:= 'Nejlep�� sk�re: ' + inttostr(nejscore);
  skore.Caption:= 'Sk�re: ' + inttostr(score);
  //Do labelu si nech�v�m vypisovat aktu�ln� sk�re
  statusbar1.Panels[0].Text:= 'Left: ' + inttostr(character.Left) + ' Top: ' + inttostr(character.Top);
  statusbar1.Panels[1].Text:= 'Left: ' + inttostr(prekazka.Left) + ' Top: ' + inttostr(prekazka.Top);
  //Do status baru si nech�v�m vypisovat, na jak� pozici se pr�v� nach�z� p�ek�ky a postavi�ka.
  if score<=500 then timer2.Interval:=20;
  if (score>500) and (score<=1000) then timer2.Interval:=18;
  if (score>1000) and (score<=1500) then timer2.Interval:=16;
  if (score>1500) and (score<=2000) then timer2.Interval:=14;
  if (score>2000) and (score<=3000) then timer2.Interval:=12;
  if (score>3000) and (score<=4000) then timer2.Interval:=9;
  if (score>4000) and (score<=5000) then timer2.Interval:=6;
  if (score>5000) and (score<=6000) then timer2.Interval:=5;
  if (score>6000) and (score<=7000) then timer2.Interval:=4;
  if (score>7000) and (score<=8000) then timer2.Interval:=3;
  if (score>8000) and (score<=9000) then timer2.Interval:=2;
  if score>9000 then timer2.Interval:=1;
  //Tyto podm�nky slou�� ke zrychlov�n� pohybuj�c�ch se p�ek�e, zv�t�uje to obt�nost.
end;

procedure TForm1.Timer2Timer(Sender: TObject);
begin
  if prekazka.Left>-50 then
    prekazka.Left:=prekazka.Left - 8
  else prekazka.Left:=random(120)+950;
  if prekazka2.Left>-50 then
    prekazka2.Left:=prekazka2.Left - 8
  else prekazka2.Left:=random(120)+1700;
  if prekazka3.Left>-50 then
    prekazka3.Left:=prekazka3.Left - 8
  else prekazka3.Left:=random(120)+2550;
  if oblacek.Left>-50 then
    oblacek.Left:=oblacek.Left - 8
  else oblacek.Left:=random(500)+4500;
  { Tyto podm�nky zji�tuj�, jestli se m��ou p�ek�ky pohybovat, podle toho,
    kde se nach�z�, jestli�e dos�hnou za��tku, objev� se n�kde vzadu, aby
    se mohli zase pohybovat dop�edu.
  }

  if (((((character.Left+49>prekazka.Left) and (character.Left+25<prekazka.Left))
      or ((character.Left<prekazka.Left+25) and (character.Left>prekazka.Left+13)))
      or (((character.Left+49>prekazka2.Left) and (character.Left+25<prekazka2.Left))
      or ((character.Left<prekazka2.Left+25) and (character.Left>prekazka2.Left+13)))
      or (((character.Left+49>prekazka3.Left) and (character.Left+25<prekazka3.Left))
      or ((character.Left<prekazka3.Left+25) and (character.Left>prekazka3.Left+13))))
      and (character.Top+55>256)) or ((((character.Left+49>oblacek.Left) and (character.Left+25<oblacek.Left))
      or ((character.Left<oblacek.Left+25) and (character.Left>oblacek.Left+13))) and (character.Top<174))
  //Tato podm�nka slou�� ke zji�t�n�, jestli se postavi�ka nedotkla p�ek�ek.
    then
      begin
        if score>nejscore then  //Zjis�uji, jestli dosavadn� sk�re je vy���, ne� nejvy��� p�edchoz�.
          begin
          nejscore:=score;   //Do nejlep��ho sk�re dosad�m dosavadn�
          thebestscore.Caption:= 'Nejlep�� sk�re: ' + inttostr(nejscore); //vyp�u nejlep�� sk�re do labelu
          end;
        timer1.Enabled:=false; //Zastav�m sk�k�n� s postavi�kou
        timer2.Enabled:=false; //Zastav�m pohybov�n� p�ek�ek
        if (MessageDlg('GAME OVER! TRY AGAIN?', // Zept�m se hr��e, jestli chce nebo nechce pokra�ovat.
        mtConfirmation, [mbYes, mbNo], 0)) = mrYes then
          begin
            score:=0; skore.Caption:='Sk�re: 0';    //sk�re se vynuluje
            character.Top:=274;  //postavi�ka se vr�t� na svou p�vodn� pozici
            prekazka.Left:=random(120)+900;
            prekazka2.Left:=random(120)+1700; // p�ek�ky se posunou na pozici, kde nejsou vid�t, aby se za�li pohybovat.
            prekazka3.Left:=random(120)+2550;
            oblacek.Left:=random(500)+4500;
            warning.Visible:=true;
          end
      //Jestli�e kliknu na ano, z�stanu ve h�e a mohu za��t od znovu.
        else
          begin
            zastavit:=false;
            skore.Visible:=false;
            thebestscore.Visible:=true;
            thebestscore.Left:=335; thebestscore.Top:=143;
            pozadi.Visible:=false;
            cesticka.Visible:=false;
            character.Top:=239; character.Left:=384;
            prekazka.Visible:=false;
            prekazka2.Visible:=false;
            prekazka3.Visible:=false;
            play.Visible:=true;
            oblacek.Visible:=false;
            warning.Visible:=false;
          end;
      //Jestli�e kliknu na ne, tak m� to vr�t� na hlavn� obrazovku, kde m�m n�jak� mo�nosti.
      end;

end;

procedure TForm1.Timer3Timer(Sender: TObject);
begin
  score:=score+1;
  //Tento timer slou�� k p�i��t�n� sk�re, proto�e v timeru2 se m�n� interval, tak by se zrychlovalo i na��t�n� sk�re
end;

end.

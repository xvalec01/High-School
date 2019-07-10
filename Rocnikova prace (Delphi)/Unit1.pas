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
    úvodní: TImage;
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
  zastavit:boolean;  //promìnná zastavit slouí k zjišování, jestli se panáèek pøi skoku u dosáhnul urèité vıšky
                     //jednoduše je tu, aby mohl charakter skákat
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
  //Jestlie stisknu mezerník, spustí se timery, které vlastnì spouští celou hru.

end;

procedure TForm1.PlayClick(Sender: TObject);
begin
  úvodní.Visible:=true;
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
  //Tyto podmínky slouí ke skákání postavièky, jestlie dosáhne urèitého bodu, vrácí se dolù
  thebestscore.Caption:= 'Nejlepší skóre: ' + inttostr(nejscore);
  skore.Caption:= 'Skóre: ' + inttostr(score);
  //Do labelu si nechávám vypisovat aktuální skóre
  statusbar1.Panels[0].Text:= 'Left: ' + inttostr(character.Left) + ' Top: ' + inttostr(character.Top);
  statusbar1.Panels[1].Text:= 'Left: ' + inttostr(prekazka.Left) + ' Top: ' + inttostr(prekazka.Top);
  //Do status baru si nechávám vypisovat, na jaké pozici se právì nachází pøekáky a postavièka.
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
  //Tyto podmínky slouí ke zrychlování pohybujících se pøekáe, zvìtšuje to obtínost.
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
  { Tyto podmínky zjištují, jestli se mùou pøekáky pohybovat, podle toho,
    kde se nachází, jestlie dosáhnou zaèátku, objeví se nìkde vzadu, aby
    se mohli zase pohybovat dopøedu.
  }

  if (((((character.Left+49>prekazka.Left) and (character.Left+25<prekazka.Left))
      or ((character.Left<prekazka.Left+25) and (character.Left>prekazka.Left+13)))
      or (((character.Left+49>prekazka2.Left) and (character.Left+25<prekazka2.Left))
      or ((character.Left<prekazka2.Left+25) and (character.Left>prekazka2.Left+13)))
      or (((character.Left+49>prekazka3.Left) and (character.Left+25<prekazka3.Left))
      or ((character.Left<prekazka3.Left+25) and (character.Left>prekazka3.Left+13))))
      and (character.Top+55>256)) or ((((character.Left+49>oblacek.Left) and (character.Left+25<oblacek.Left))
      or ((character.Left<oblacek.Left+25) and (character.Left>oblacek.Left+13))) and (character.Top<174))
  //Tato podmínka slouí ke zjištìní, jestli se postavièka nedotkla pøekáek.
    then
      begin
        if score>nejscore then  //Zjisuji, jestli dosavadní skóre je vyšší, ne nejvyšší pøedchozí.
          begin
          nejscore:=score;   //Do nejlepšího skóre dosadím dosavadní
          thebestscore.Caption:= 'Nejlepší skóre: ' + inttostr(nejscore); //vypíšu nejlepší skóre do labelu
          end;
        timer1.Enabled:=false; //Zastavím skákání s postavièkou
        timer2.Enabled:=false; //Zastavím pohybování pøekáek
        if (MessageDlg('GAME OVER! TRY AGAIN?', // Zeptám se hráèe, jestli chce nebo nechce pokraèovat.
        mtConfirmation, [mbYes, mbNo], 0)) = mrYes then
          begin
            score:=0; skore.Caption:='Skóre: 0';    //skóre se vynuluje
            character.Top:=274;  //postavièka se vrátí na svou pùvodní pozici
            prekazka.Left:=random(120)+900;
            prekazka2.Left:=random(120)+1700; // pøekáky se posunou na pozici, kde nejsou vidìt, aby se zaèli pohybovat.
            prekazka3.Left:=random(120)+2550;
            oblacek.Left:=random(500)+4500;
            warning.Visible:=true;
          end
      //Jestlie kliknu na ano, zùstanu ve høe a mohu zaèít od znovu.
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
      //Jestlie kliknu na ne, tak mì to vrátí na hlavní obrazovku, kde mám nìjaké monosti.
      end;

end;

procedure TForm1.Timer3Timer(Sender: TObject);
begin
  score:=score+1;
  //Tento timer slouí k pøièítání skóre, protoe v timeru2 se mìní interval, tak by se zrychlovalo i naèítání skóre
end;

end.

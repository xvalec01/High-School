program SIFRA;
uses crt;
var a,z,VA,VZ,i,nula,devet,d,p,znak:integer;
    vstup,vyst:string;

procedure SIFRUJ (vstup:string);
   begin
     for i:= 1 to length(vstup) do
      if p>0 then
        begin
          znak:=ord(vstup[i]);
          if ((znak >= VA) and (znak <= VZ)) then
            begin
              if (znak + p > VZ) then
              vyst[i]:= chr(znak + p - 26) else
              vyst[i]:= chr(znak+p);
            end;

          if ((znak >= a) and (znak <= z)) then

             if ((znak + p) > z) then
             vyst[i]:= chr(znak + p -26) else
             vyst[i]:= chr(znak + p);

          if ((znak >= nula) and (znak <= devet)) then

             if ((znak + p) > devet) then
             vyst[i]:= chr(znak + p -10) else
             vyst[i]:= chr(znak + p);

        end
      else if p<0 then
         begin
           znak:=ord(vstup[i]);
         if ((znak >= VA) and (znak <= VZ)) then

             if ((znak + p) < VA) then
             vyst[i]:= chr(znak + p +26) else
             vyst[i]:= chr(znak + p);

         if ((znak >=a) and (znak <=z)) then

             if ((znak + p) < a) then
             vyst[i]:= chr(znak + p +26) else
             vyst[i]:= chr(znak + p);

         if ((znak >=nula) and (znak <=devet)) then

             if ((znak + p) < nula) then
             vyst[i]:= chr(znak + p +10) else
             vyst[i]:= chr(znak + p);

         end;
   end;
begin
     clrscr;
     writeln('Napiç vØtu, kterou chceç zaçifrovat.');
     readln(vstup);
     writeln('Zadej o kolik pozic chceç çifrovat.');
     readln(p);
     vyst:=vstup;
     a:=ord('a');
     z:=ord('z');
     VA:=ord('A');
     VZ:=ord('Z');
     nula:=ord('0');
     devet:=ord('9');
     SIFRUJ(vstup);
     writeln('Zaçifrovanì zadanì ıetØzec: ',vyst);
     readln;
end.

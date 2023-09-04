require 'rubygems'
require 'gosu'

module ZOrder
  BACKGROUND, PLAYER, UI = *0..2
end

GENRE_NAMES = ['Null', 'Pop', 'Classic', 'Jazz', 'Rock']

class Artwork
  attr_accessor :bmp

  def initialize (file)
    @bmp = Gosu::Image.new(file)
  end
end

class Album
  attr_accessor :title, :artwork, :artist, :tracks, :pos

  def initialize (title, artwork, artist, tracks, pos)
    @title = title
    @artwork = artwork
    @artist = artist
    @tracks = tracks
    @pos = pos
  end
end

class Track
  attr_accessor :name, :location, :box

  def initialize (name, location, box)
    @name = name
    @location = location
    @box = box
  end
end

class Box
  attr_accessor :leftX, :topY, :rightX, :bottomY

  def initialize (leftX, topY, rightX, bottomY)
    @leftX = leftX
    @topY = topY
    @rightX = rightX
    @bottomY = bottomY
  end
end

class Artworkpos
  attr_accessor :leftX, :topY, :width

  def initialize (leftX, topY, width)
    @leftX = leftX
    @topY = topY
    @width = width
  end
end

class Plisttrack
  attr_accessor :name, :location, :box

  def initialize (name, location, box)
    @name = name
    @location = location
    @box = box
  end
end

class Playlist
  attr_accessor :title, :artwork, :tracks, :pos

  def initialize (title, artwork, tracks, pos)
    @title = title
    @artwork = artwork
    @tracks = tracks
    @pos = pos
  end
end

class Addplaylist
  attr_accessor :title, :location

  def initialize (title, location)
    @title = title
    @location = location
  end
end

class MusicPlayerMain < Gosu::Window
  WIDTH = 800
  HEIGHT = 600

  def initialize
    super WIDTH, HEIGHT
    self.caption = "HD GUI MUSIC PLAYER"
    @title_font = Gosu::Font.new(30, name:'fonts/Comfortaa-Regular.ttf')
    @track_font = Gosu::Font.new(28, name:'fonts/MPLUS1p-Regular.ttf')
    @add_track_font = Gosu::Font.new(25, name:'fonts/MPLUS1p-Regular.ttf')
    @albums = load_albums()
    @current_album = -1
    @current_track = 0
    @frame = -1
    @volscale = 1.0
    @playlists = load_playlists()
    @current_playlist = -1
    @add_track = Array.new()
  end

  def load_albums()
    #function of reading the albums in the txt file
    def read_albums(file)
      count = file.gets.to_i
      albums = Array.new()
      i = 0
      while i < count
        album = read_album(file, i)
        albums << album
        i+=1
      end
      return albums
    end

    #function of reading a single album file
    def read_album(file, i)
      title = file.gets.chomp
      artwork = file.gets.chomp
      artist = file.gets.chomp
      tracks = read_tracks(file)

      if i < 3
        xleft = 50 + i%3*250
        yup = 120
      elsif i >= 3 && i < 6
        xleft = 50 + i%3*250
        yup = 350
      end
      artwidth = 200
      pos = Artworkpos.new(xleft, yup, artwidth)

      album = Album.new(title, artwork, artist, tracks, pos)
      return album
    end

    #function of reading tracks of an album
    def read_tracks(file)
      count = file.gets.to_i
      tracks = Array.new()
      i = 0
      while i < count
        track = read_track(file, i)
        tracks << track
        i+=1
      end
      return tracks
    end

    #function of reading a single track of an album
    def read_track(file, i)
      name = file.gets.chomp
      loc = file.gets.chomp

      #positioning of each track
      xleft = 450
      yup = 140 + i*50
      xright = xleft + @track_font.text_width(name)
      ybottom = yup + @track_font.height()
      box = Box.new(xleft, yup, xright, ybottom)
      track = Track.new(name, loc, box)
      return track
    end

    #read the files.txt and runs the functions of writing the read file into the array and class as an object, and returns it for the whole program to use
    albums_file = File.new("albums.txt", "r")
    albums = read_albums(albums_file)
    albums_file.close()
    return albums
  end

  def load_playlists()
    #function to read the playlists
    def read_playlists(file)
      count = file.gets.to_i
      playlists = Array.new()
      i = 0
      while i < count
        playlist = read_playlist(file, i)
        playlists << playlist
        i += 1
      end
      return playlists
    end

    #function to read single playlist
    def read_playlist(file, i)
      playname = file.gets.chomp
      partwork = file.gets.chomp
      ptracks = read_ptracks(file)
      if i < 3
        xleft = 50 + i%3*250
        yup = 120
      elsif i >= 3 && i < 6
        xleft = 50 + i%3*250
        yup = 350
      end
      artwidth = 200
      pos = Artworkpos.new(xleft, yup, artwidth)

      playlist = Playlist.new(playname, partwork, ptracks, pos)
    end

    #function to read tracks
    def read_ptracks(file)
      count = file.gets.to_i
      i = 0
      ptracks = Array.new()
      i = 0
      while i < count
        ptrack = read_ptrack(file,i)
        ptracks << ptrack
        i += 1
      end
      return ptracks
    end

    def read_ptrack(file, i)
      pname = file.gets.chomp
      ploc = file.gets.chomp

      xleft = 450
      yup = 140 + i*50
      xright = xleft + @track_font.text_width(pname)
      ybottom = yup + @track_font.height()

      box = Box.new(xleft, yup, xright, ybottom)
      ptrack = Plisttrack.new(pname, ploc, box)
      return ptrack
    end

    playlists_file = File.new("playlist.txt", "r")
    playlists = read_playlists(playlists_file)
    playlists_file.close()
    return playlists
  end

  def draw
    #method of drawing the Music Player Background
    def draw_background
      backcolour = Gosu::Color.new(0xff121212)
      Gosu.draw_rect(0, 0, WIDTH, HEIGHT, backcolour, ZOrder::BACKGROUND)
    end

    #method of drawing the title of the Music Player
    def draw_title
      @title_font.draw("GUI MUSIC PLAYER", 270, 50, ZOrder::PLAYER, 1.0, 1.0, Gosu::Color::WHITE)
      draw_rect(245, 85, 50+@title_font.text_width("GUI MUSIC PLAYER"), 2, Gosu::Color::WHITE, ZOrder::PLAYER)
    end

    #function of drawing the albums in the main page
    #note : Every artwork has the size of 800px x 800px, for the main page to show 200px size width and height, we use 0.25 scale
    def draw_albums(albums)
      i = 0
      while i < albums.length
        @bmp = Gosu::Image.new(albums[i].artwork)
        @bmp.draw(albums[i].pos.leftX, albums[i].pos.topY, ZOrder::PLAYER, 0.25, 0.25)
        i+=1
      end
    end

    def draw_album(albums)
      x = 50
      y = 100
      i = @current_album
      @bmp = Gosu::Image.new(albums[i].artwork)
      @bmp.draw(x, y, ZOrder::PLAYER, 0.45, 0.45)
      draw_album_title(albums[i])
      draw_tracks(albums[i])
    end

    def draw_album_title (album)
      @title_font.draw("  <  GUI MUSIC PLAYER  <  #{album.artist}", 75, 40, ZOrder::PLAYER, 1.0, 1.0, Gosu::Color::WHITE)
    end


    def draw_tracks(album)
      if !album.tracks.empty?
        i = 0
        while i < album.tracks.length
          @track_font.draw(album.tracks[i].name, album.tracks[i].box.leftX, album.tracks[i].box.topY, ZOrder::UI, 1.0, 1.0, Gosu::Color::WHITE)

          #hovers background rectangle gray
          if mouse_x > album.tracks[i].box.leftX && mouse_x < album.tracks[i].box.rightX && mouse_y > album.tracks[i].box.topY && mouse_y < album.tracks[i].box.bottomY
            hovercolour = Gosu::Color.new(0xff5a5a5a)
            Gosu.draw_rect(410, album.tracks[i].box.topY-11, 390, @track_font.height+22, hovercolour, ZOrder::PLAYER)
          end
          i+=1
        end

        #displays the playing track by highlighting it by the color green
        playingtrackcolour = Gosu::Color.new(0xff1DB954)
        if @current_album >= 0 || @current_playlist >= 0 && @song.playing? || @song.paused?
          @track_font.draw(album.tracks[@current_track].name, album.tracks[@current_track].box.leftX, album.tracks[@current_track].box.topY, ZOrder::UI, 1.0, 1.0, playingtrackcolour)
        end

        #displays playing track again in the bottom of the page
        if @song.playing? || @song.paused?
          if @track_font.text_width(album.tracks[@current_track].name) < 250
            @track_font.draw(album.tracks[@current_track].name, 50, 541, ZOrder::PLAYER, 1.0, 1.0, Gosu::Color::WHITE)
          end
        end
      end
    end

    def draw_buttons()
      #all buttons have the size of 100px, but differences may occur
      back_btn = Gosu::Image.new('images/buttons/back.png')
      prev_btn = Gosu::Image.new('images/buttons/previous.png')
      next_btn = Gosu::Image.new('images/buttons/next.png')
      pauseplay_btn = Gosu::Image.new('images/buttons/pauseplay.png')
      pause_btn = Gosu::Image.new('images/buttons/pause.png')
      play_btn = Gosu::Image.new('images/buttons/play.png')
      nextmax_btn = Gosu::Image.new('images/buttons/nextmax.png')
      prevmax_btn = Gosu::Image.new('images/buttons/previousmax.png')
      mute_btn = Gosu::Image.new('images/buttons/mute.png')
      unmute_btn = Gosu::Image.new('images/buttons/unmute.png')

      if @frame <= -2 && @playlists[@current_playlist].tracks.empty? || @albums[@current_album].tracks.empty?
        back_btn.draw(20, 28, ZOrder::PLAYER, 0.45, 0.45)
      else
        #button to back to main page
        back_btn.draw(20, 28, ZOrder::PLAYER, 0.45, 0.45)

        #if song is paused, the icon shown is the play button, vice versa
        if @song.paused? || !@song.playing?
          play_btn.draw(WIDTH/2-(30/2), 540, ZOrder::PLAYER, 0.3, 0.3)
        elsif @song.playing?
          pause_btn.draw(WIDTH/2-(30/2), 540, ZOrder::PLAYER, 0.3, 0.3)
        end

        #if the current track is 0, which is the first of the album, it will show that it can't previous and change the white button to the grey one
        if @current_track != 0
          prev_btn.draw(WIDTH/2-(30/2)-90,532.5, ZOrder::PLAYER, 0.45, 0.45)
        else
          prevmax_btn.draw(WIDTH/2-(30/2)-90,532.5, ZOrder::PLAYER, 0.45, 0.45)
        end

        #if the current track is the end of the album, it will do the same as the prev max, but it works on the next button
        if @frame >= 0 && @current_track != (@albums[@current_album].tracks.length-1)
          next_btn.draw(WIDTH/2-(30/2)+75,532.5, ZOrder::PLAYER, 0.45, 0.45)
        elsif @frame < -2 && @current_track != (@playlists[@current_playlist].tracks.length-1)
          next_btn.draw(WIDTH/2-(30/2)+75,532.5, ZOrder::PLAYER, 0.45, 0.45)
        else
          nextmax_btn.draw(WIDTH/2-(30/2)+75,532.5, ZOrder::PLAYER, 0.45, 0.45)
        end

        #draw the mute and unmute button
        if @volscale != 0.0
          unmute_btn.draw(630, 543, ZOrder::PLAYER, 0.25, 0.25)
        else
          mute_btn.draw(630, 543, ZOrder::PLAYER, 0.25, 0.25)
        end

        #draws the volume drag bar
        Gosu.draw_rect(670, 553, 100*@volscale, 5, Gosu::Color::WHITE, ZOrder::UI)
        backvolcol = Gosu::Color.new(0xff5a5a5a)
        Gosu.draw_rect(670, 553, 100, 5, backvolcol, ZOrder::PLAYER)
      end
    end

    def draw_playlists(playlists)
      i = 0
      while i < playlists.length
        playlist = Gosu::Image.new(playlists[i].artwork)
        if playlists[i].tracks.empty?
          playlist = Gosu::Image.new("images/empty_playlist_box.png")
        end
        playlist.draw(playlists[i].pos.leftX, playlists[i].pos.topY, ZOrder::PLAYER, 0.25, 0.25)
        i+=1
      end
    end

    def draw_playlist(playlists)
      x = 50
      y = 100
      i = @current_playlist
      image = Gosu::Image.new(playlists[i].artwork)
      image.draw(x, y, ZOrder::PLAYER, 0.45, 0.45,)

      delete_btn = Gosu::Image.new('images/buttons/delete.png')
      delete_btn.draw(730, 37, ZOrder::PLAYER, 0.3, 0.3)

      draw_playlist_title(playlists[i])
      draw_tracks(playlists[i])
    end

    def draw_playlist_title(playlist)
      @title_font.draw("  <  GUI MUSIC PLAYER  <  #{playlist.title}", 75, 40, ZOrder::PLAYER, 1.0, 1.0, Gosu::Color::WHITE)
    end

    def draw_add(albums)
      #drawing the first row
      i = 0
      while i < 3
        x = 60 + 250*i
        y = 100
        k = 0
        while k < albums[i].tracks.length
          @add_track_font.draw(albums[i].tracks[k].name, x, y, ZOrder::PLAYER, 1.0, 1.0, Gosu::Color::WHITE)
          if !@add_track.empty?
            t = 0
            while t < @add_track.length
              if @add_track[t].title == @albums[i].tracks[k].name
                playingtrackcolour = Gosu::Color.new(0xff1DB954)
                @add_track_font.draw(albums[i].tracks[k].name, x, y, ZOrder::PLAYER, 1.0, 1.0, playingtrackcolour)
              end
              t += 1
            end
          end
          k += 1
          y += (@add_track_font.height + 20)
        end
        i += 1
      end

      #drawing the second row
      i = 0
      while i < 3
        x = 60 + 250*i
        y = 350
        k = 0
        while k < albums[i+3].tracks.length
          @add_track_font.draw(albums[i+3].tracks[k].name, x, y, ZOrder::PLAYER, 1.0, 1.0, Gosu::Color::WHITE)
          if !@add_track.empty?
            t = 0
            while t < @add_track.length
              if @add_track[t].title == @albums[i+3].tracks[k].name
                playingtrackcolour = Gosu::Color.new(0xff1DB954)
                @add_track_font.draw(albums[i+3].tracks[k].name, x, y, ZOrder::PLAYER, 1.0, 1.0, playingtrackcolour)
              end
              t += 1
            end
          end
          k += 1
          y += (@add_track_font.height + 20)
        end
        i += 1
      end

      i = 0
      hovercolour = Gosu::Color.new(0xff5a5a5a)
      while i < 3
        x = 60 + 250*i
        y = 100
        k = 0
        while k < albums[i].tracks.length
          if mouse_x > x && mouse_x < (x + @add_track_font.text_width(albums[i].tracks[k].name)) && mouse_y > y && mouse_y < (y + @add_track_font.height)
            Gosu.draw_rect(x - 15, y - 10, 247.5, @add_track_font.height + 20, hovercolour, ZOrder::BACKGROUND)
          end
          k += 1
          y += (@add_track_font.height + 20)
        end
        i += 1
        x = 100 + 240*i
      end

      i = 0
      while i < 3
        x = 60 + 250*i
        y = 350
        k = 0
        while k < albums[i+3].tracks.length
          if mouse_x > x && mouse_x < (x + @add_track_font.text_width(albums[i+3].tracks[k].name)) && mouse_y > y && mouse_y < (y + @add_track_font.height)
            Gosu.draw_rect(x - 15, y - 10, 247.5, @add_track_font.height + 20, hovercolour, ZOrder::BACKGROUND)
          end
          k += 1
          y += (@add_track_font.height + 20)
        end
        i += 1
        x = 100 + 240*i
      end

      if !@add_track.empty?
        add_btn = Gosu::Image.new('images/buttons/add.png')
        add_btn.draw(WIDTH/2-(50/2), 530, ZOrder::PLAYER, 0.5, 0.5)
      end
    end

    def draw_nextnprev_page
      next_page_btn = Gosu::Image.new("images/buttons/nextpage.png")
      prev_page_btn = Gosu::Image.new("images/buttons/prevpage.png")

      case @frame
      when -1
        next_page_btn.draw(750, 305, ZOrder::PLAYER, 0.5, 0.5)
      when -2
        prev_page_btn.draw(0, 305, ZOrder::PLAYER, 0.5, 0.5)
      end
    end
    #the line below is to draw the background of the music player

    def draw_audio_wave()
      if !@song.playing? || @song.paused?
        #height = rand(0..2)
        sleep (0.05)
        i = 0
        while i < 12
          Gosu.draw_rect((WIDTH/2)+46-(8*i), 500, 4, 5, Gosu::Color::WHITE, ZOrder::PLAYER)
          i += 1
        end
      elsif @song.playing?
        sleep(0.05)
        i = 0
        hbar = Array.new()
        while i < 12
          hbar[i] = rand(0..3)
          Gosu.draw_rect((WIDTH/2)+46-(8*i), 500-5*hbar[i]/2, 4, 5+5*hbar[i], Gosu::Color::WHITE, ZOrder::PLAYER)
          i += 1
        end
      end

    end

    draw_background()

    case @frame
    when -1
      draw_title()
      draw_albums(@albums)
      draw_nextnprev_page()
    when -2
      draw_title()
      draw_nextnprev_page()
      draw_playlists(@playlists)
    when -8..-3
      plist = (-3 - @frame)
      if @playlists[plist].tracks.empty?
        @title_font.draw("  <  GUI MUSIC PLAYER  <  #{@playlists[plist].title}", 75, 40, ZOrder::PLAYER, 1.0, 1.0, Gosu::Color::WHITE)
        draw_add(@albums)
        draw_buttons()
      else
        draw_playlist(@playlists)
        draw_buttons()
        draw_audio_wave()
      end
    when 0..6
      draw_album(@albums)
      draw_buttons()
      draw_audio_wave()
    end
  end

  #function of playing the tracks
  def playTrack(track, album)
    if track < album.tracks.length && !album.tracks.empty?
      @song = Gosu::Song.new(album.tracks[track].location)
      @song.play(false)
    end
  end

  def addplay (ai, ti)
    title = @albums[ai].tracks[ti].name
    location = @albums[ai].tracks[ti].location
    addplaylist = Addplaylist.new(title, location)
    @add_track << addplaylist
  end

  def write_plist_array (added_tracks, currentplaylist)
    count = added_tracks.length
    ptracks = Array.new()
    i = 0
    while i < count
      read_added = read_added_array(added_tracks[i], i)
      ptracks << read_added
      i += 1
    end

    @playlists[currentplaylist].tracks = ptracks
    @add_track.clear
    rewrite_playlist()
  end

  def rewrite_playlist()
    #opens file for writing
    file = File.new("playlist.txt", "w")
    total_play = @playlists.length
    i  = 0
    file.puts total_play
    while i < total_play
      file.puts @playlists[i].title
      file.puts @playlists[i].artwork
      file.puts @playlists[i].tracks.length
      j = 0
      while j < @playlists[i].tracks.length
        file.puts @playlists[i].tracks[j].name
        file.puts @playlists[i].tracks[j].location
        j += 1
      end
      i += 1
    end
    #close the opened file
    file.close
  end

  def read_added_array (tracks, i)
    title = tracks.title
    location = tracks.location

    xleft = 450
    yup = 140 + i*50
    xright = xleft + @track_font.text_width(title)
    ybottom = yup + @track_font.height()

    box = Box.new(xleft, yup, xright, ybottom)
    added_play = Plisttrack.new(title, location, box)
    return added_play
  end

  def update
    if @song != nil
			if !@song.playing? && !@song.paused? && @current_album >= 0
				@current_track += 1
				playTrack(@current_track, @albums[@current_album])
			end

      #song playing change volume after the volscale is changed
      if @song.playing?
        @song.volume = @volscale
      end

      if !@song.playing? && !@song.paused? && @current_playlist >= 0
        @current_track += 1
        playTrack(@current_track, @playlists[@current_playlist])
      end
		end

  end

  def needs_cursor?; true; end

  def area_clicked(leftX, topY, rightX, bottomY)
    if mouse_x > leftX && mouse_x < rightX && mouse_y > topY && mouse_y < bottomY
      return true
    else
      return false
    end
  end

  def button_down(id)
    case id
      when Gosu::MsLeft
        if @frame == -1
          i = 0
          k = 0
          while i < @albums.length
            if area_clicked(@albums[i].pos.leftX, @albums[i].pos.topY, (@albums[i].pos.leftX + 200), (@albums[i].pos.topY + 200))
              @current_album = i
              @current_track = k
              @frame = i
              if @song == nil && @current_album >= 0
                playTrack(@current_track, @albums[@current_album])
              elsif @song != nil && @current_album >= 0
                playTrack(@current_track, @albums[@current_album])
              end
            end
            i+=1
          end

          #next page button
          if area_clicked(750, 305, 800, 355)
            @frame -= 1
          end
        end

        #playlists page
        if @frame == -2
          if area_clicked(0, 305, 50, 355)
            @frame += 1
          end
          i = 0
          while i < @playlists.length
            if area_clicked(@playlists[i].pos.leftX, @playlists[i].pos.topY, (@playlists[i].pos.leftX + 200), (@playlists[i].pos.topY + 200))
              @current_playlist = i
              @frame -= ( @current_playlist + 1 )
              @current_track = 0
              if @song == nil && @current_playlist >= 0
                playTrack(@current_track, @playlists[@current_playlist])
              elsif @song != nil && @current_playlist >= 0
                playTrack(@current_track, @playlists[@current_playlist])
              end
            end
            i+=1
          end
        end

        #each playlist page
        if @frame < -2
          if !@playlists[@current_playlist].tracks.empty?
            #when clicking the track title
            t = 0
            while t < @playlists[@current_playlist].tracks.length
              trackposnow = @playlists[@current_playlist].tracks[t].box
              if area_clicked(trackposnow.leftX, trackposnow.topY, trackposnow.rightX, trackposnow.bottomY)
                @current_track = t
                playTrack(@current_track, @playlists[@current_playlist])
              end
              t += 1
            end

            #back to main menu button
            if area_clicked(20, 28, 65, 73)
              i = -1
              @current_playlist = i
              @frame = -2
              @song.stop
            end

            #pause and play button
            if area_clicked(385, 540, 415, 570)
              if @song.playing?
                @song.pause
              elsif @song.paused?
                @song.play
              elsif !@song.playing?
                @current_track = 0
                playTrack(@current_track, @playlists[@current_playlist])
              end
            end

            #previous button
            if area_clicked(295, 532.5, 340, 577.5)
              if @current_track != 0
                @current_track -= 1
                playTrack(@current_track, @playlists[@current_playlist])
              end
              #@current_track != @albums[@current_album].tracks.length-1
            end

            #next button
            if area_clicked(460, 532.5, 505, 577.5)
              if @current_track < @playlists[@current_playlist].tracks.length-1
                @current_track += 1
                playTrack(@current_track, @playlists[@current_playlist])
              end
            end

            #mute and unmute button
            if area_clicked(630, 543, 655, 568)
              if @volscale != 0.0
                @volscale = 0.0
              else
                @volscale = 1.0
              end
            end

            #vol bar
            sc = 0
            while sc <= 100
              #little area clicked off the bar, but inprecision makes user easily set the value they want
              if area_clicked(668+sc, 553, 672+sc, 558)
                scale = sc.to_f/100
                @volscale = scale
              end
              sc += 1
            end

            #delete playlist button
            if area_clicked(730, 37, 760, 67)
              i = -1
              @playlists[@current_playlist].tracks.clear
              rewrite_playlist()
              @current_playlist = i
              @frame = -2
              @song.stop
            end
          else
            #back to main menu button
            if area_clicked(20, 28, 65, 73)
              i = -1
              @current_playlist = i
              @frame = -2
              @add_track.clear
            end

            i = 0
            while i < 3
              k = 0
              y = 100
              x = 60 + 250*i
              while k < @albums[i].tracks.length
                if area_clicked(x, y, (x + @add_track_font.text_width(@albums[i].tracks[k].name)), (y + @add_track_font.height))
                  if @add_track.empty? || @add_track.length < 6
                    addplay(i, k)
                  end
                end
                k += 1
                y += (@add_track_font.height + 20)
              end
              i += 1
            end

            i = 0
            while i < 3
              k = 0
              y = 350
              x = 60 + 250*i
              while k < @albums[i + 3].tracks.length
                if area_clicked(x, y, (x + @add_track_font.text_width(@albums[i + 3].tracks[k].name)), (y + @add_track_font.height))
                  if @add_track.empty? || @add_track.length < 6
                    addplay(i+3,k)
                  end
                end
                k += 1
                y += (@add_track_font.height + 20)
              end
              i += 1
            end

            if !@add_track.empty?
              if area_clicked(375,530,425,580)
                write_plist_array(@add_track, @current_playlist)
                @current_track = 0
                if @song == nil && @current_playlist >= 0
                  playTrack(@current_track, @playlists[@current_playlist])
                elsif @song != nil && @current_playlist >= 0
                  playTrack(@current_track, @playlists[@current_playlist])
                end
              end
            end
          end
        end

        if @frame >= 0
          #back to main menu button
          if area_clicked(20, 28, 65, 73)
            i = -1
            @current_album = i
            @frame = i
            @song.stop
          end

          #pause and play button
          if area_clicked(385, 540, 415, 570)
            if @song.playing?
              @song.pause
            elsif @song.paused?
              @song.play
            elsif !@song.playing?
              @current_track = 0
              playTrack(@current_track, @albums[@current_album])
            end
          end

          #previous button
          if area_clicked(295, 532.5, 340, 577.5)
            if @current_track != 0
              @current_track -= 1
              playTrack(@current_track, @albums[@current_album])
            end
          end

          #next button
          if area_clicked(460, 532.5, 505, 577.5)
            if @current_track < @albums[@current_album].tracks.length-1
              @current_track += 1
              playTrack(@current_track, @albums[@current_album])
            end
          end

          #mute and unmute button
          if area_clicked(630, 543, 655, 568)
            if @volscale != 0.0
              @volscale = 0.0
            else
              @volscale = 1.0
            end
          end

          #when clicking the track title
          t = 0
          while t < @albums[@current_album].tracks.length
            trackposnow = @albums[@current_album].tracks[t].box
            if area_clicked(trackposnow.leftX, trackposnow.topY, trackposnow.rightX, trackposnow.bottomY)
              @current_track = t
              playTrack(@current_track, @albums[@current_album])
            end
            t += 1
          end

          #volume bar
          sc = 0
          while sc <= 100
            #little area clicked off the bar, but inprecision makes user easily set the value they want
            if area_clicked(668+sc, 553, 672+sc, 558)
              scale = sc.to_f/100
              @volscale = scale
            end
            sc += 1
          end
        end
    end
  end

end

# Show is a method that loops through update and draw
MusicPlayerMain.new.show if __FILE__ == $0

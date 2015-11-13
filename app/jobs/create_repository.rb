class CreateRepository < Struct.new(:text)

  def perform
	  system("mkdir #{text}")
	  system("cd #{text} && git init --bare --shared=true")
  end

end

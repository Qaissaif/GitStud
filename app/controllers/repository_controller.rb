class RepositoryController < ApplicationController
layout "inner_layout"
	before_filter :load_repository , :only=>[:show,:edit,:add_students]


	def load_repository
		 	if @repo=Repository.where(:name=>params[:id]).last
				@repository=Gitlab::Git::Repository.new("/repositories/#{@repo.name}.git")
			end
	end

	def index

	end

	def new
		@repository=Repository.new
	end

	def create
		@assignment=Assignment.find(params[:assignment_id])
		params.permit!
		params[:repository][:name].gsub!(" ","_")
		params[:repository][:name].gsub!("\n","_")
		my_project=	params[:repository][:name]
		@repository=@assignment.repositories.new(url:params[:repository][:name],name:params[:repository][:name],:super_std=>@current_student.id)
		@repository.students << @current_student
		@current_student.repositories << @repository
		@assignment.repositories.new
		if @repository.save! && @current_student.save!
		system "sudo mkdir /repositories/#{my_project}.git && cd /repositories/#{my_project}.git && sudo git init --bare --share"
		system "sudo git clone /repositories/#{my_project}.git /first_commit/#{my_project}  && cd /first_commit/#{my_project} && sudo touch README.txt && sudo git add . && sudo git commit -m 'Initial commit' && sudo git push origin master"
		redirect_to assignment_repository_path(:assignment_id=>@assignment.id,:id=>@repository.name),:flash => { :success => "Repository created" } and return
		end
	end

	def show
		@assignment=Assignment.find(params[:assignment_id])
		@tree= Gitlab::Git::Tree.where(@repository,"master","")
	end

	def add_students
		@repo.students << Student.where(:_id=>params[:student_ids]).last
		@repo.save!
		@assignment=Assignment.find(params[:assignment_id])
		redirect_to assignment_repository_path(:assignment_id=>@assignment.id,:id=>@repo.name),:flash => { :success => "Student added" } and return

	end

	def edit
	end

	def update
	end

	def destroy
		repository=Repository.find(params[:id])
		repository.destroy
    	flash[:alert]= "repository was deleted"
    	redirect_to redirect_to dashboard_student_index_path
	end

	
end

